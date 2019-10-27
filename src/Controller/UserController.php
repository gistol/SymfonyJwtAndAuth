<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\News;
use App\Entity\User;
use App\Repository\DocumentRepository;
use App\Service\S3Service;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Security;


/**
 * @Route("/api",name="api_")
 */
class UserController extends AbstractFOSRestController
{

    /**
     * @Route("/me", name="me")
     */
    public function getUserAction(Security $security,
        DocumentRepository $documentRepository,
        S3Service $s3Service)
    {
        $username = $this->getUser()->getUsername();

        //$documentRepository->
        $em = $this->getDoctrine()->getEntityManager();
        $doc = new Document();
        $doc->setDocumentFile(new File('http://luxfon.com/pic/201407/1366x768/luxfon.com-33612.jpg'));
        $doc->setDocumentFileName('luxfon.com-33612.jpg');
        $doc->setUpdatedAt(new \DateTime);

        $s3 = $s3Service->getS3Client();

        $s3 = $s3->upload(
            'ege',
            'luxfon.com-33612.jpg',
            file_get_contents('http://luxfon.com/pic/201407/1366x768/luxfon.com-33612.jpg'),
            'public-read'
           );

        //$s3 = $s3Service->uploadFile(
        //    'http://luxfon.com/pic/201407/1366x768/luxfon.com-33612.jpg',
        //    'luxfon.com-33612.jpg',
        //    ['contentType' => 'image/jpeg']);
        echo('<pre>');print_r($s3);echo('</pre>');


        //https://mc.s3.syndev.ru/minio/ege/
        //$insert = $s3->putObject([
        //    'Bucket' => 'ege',
        //    'Key'    => 'new key',
        //    'Body'   => 'Hello from MinIO!!'
        //]);
        //echo "<pre>"; print_r($insert);echo "</pre>";

        echo('<pre>');print_r($username);echo('</pre>');
        return $this->handleView($this->view($username));
    }

}
