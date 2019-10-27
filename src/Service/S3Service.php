<?php

namespace App\Service;

class S3Service
{

    protected $s3Client = null;

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