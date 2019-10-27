<?php

namespace App\Service;

use Aws\S3\S3Client;

class S3Service
{
    /**
     * @var S3Client
     */
    private $client;
    private $s3Client;
    /**
     * @var string
     */
    private $bucket;
    /**
     * @param string $bucket
     * @param array  $s3arguments
     */
    public function __construct($bucket, array $s3arguments)
    {
        $this->setBucket($bucket);
        $this->setClient(new S3Client($s3arguments));
    }
    /**
     * @param string $fileName
     * @param string $content
     * @param array  $meta
     * @param string $privacy
     * @return string file url
     */
    public function upload( $fileName, $content, array $meta = [], $privacy = 'public-read')
    {
        $resp = $this->getClient()->upload($this->getBucket(), $fileName, $content, $privacy, [
            'Metadata' => $meta
        ]);

        return $resp->toArray()['ObjectURL'];

    }
    /**
     * @param string       $fileName
     * @param string|null  $newFilename
     * @param array        $meta
     * @param string       $privacy
     * @return string file url
     */
    public function uploadFile($fileName, $newFilename = null, array $meta = [], $privacy = 'public-read') {
        if(!$newFilename) {
            $newFilename = basename($fileName);
        }
        if(!isset($meta['contentType'])) {
            // Detect Mime Type
            $mimeTypeHandler = finfo_open(FILEINFO_MIME_TYPE);
            $meta['contentType'] = finfo_file($mimeTypeHandler, $fileName);
            finfo_close($mimeTypeHandler);
        }
        return $this->upload($newFilename, file_get_contents($fileName), $meta, $privacy);
    }
    /**
     * Getter of client
     *
     * @return S3Client
     */
    protected function getClient()
    {
        return $this->client;
    }
    /**
     * Setter of client
     *
     * @param S3Client $client
     *
     * @return $this
     */
    private function setClient(S3Client $client)
    {
        $this->client = $client;
        return $this;
    }
    /**
     * Getter of bucket
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
    }
    /**
     * Setter of bucket
     *
     * @param string $bucket
     *
     * @return $this
     */
    private function setBucket($bucket)
    {
        $this->bucket = $bucket;
        return $this;
    }

    /**
     * @return \Aws\S3\S3Client
     */
    public function getS3Client(): \Aws\S3\S3Client
    {
        if($this->s3Client == null) {
            $this->s3Client = new \Aws\S3\S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1',
                'endpoint' => 'https://mc.s3.syndev.ru',
                'use_path_style_endpoint' => true,
                'credentials' => [
                    'key'    => '1PPVM5833KTFWKV9QGLH',
                    'secret' => 'BHt6A3nSqTiiWfnrmHGoCGG/AKt+GZNRanAGgNbq',
                ],
            ]);
        }

        return $this->s3Client;
    }
}