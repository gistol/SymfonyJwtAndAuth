<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Post;
use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function getUserAction(Security $security)
    {
        $username = $this->getUser()->getUsername();

        $s3 = $this->container->get('ct_file_store.s3');

        //$s3 = new \Aws\S3\S3Client([
        //    'version' => 'latest',
        //    'region'  => 'us-east-1',
        //    'endpoint' => 'https://mc.s3.syndev.ru',
        //    'use_path_style_endpoint' => true,
        //    'credentials' => [
        //        'key'    => '1PPVM5833KTFWKV9QGLH',
        //        'secret' => 'BHt6A3nSqTiiWfnrmHGoCGG/AKt+GZNRanAGgNbq',
        //    ],
        //]);

        //https://mc.s3.syndev.ru/minio/ege/
        $insert = $s3->putObject([
            'Bucket' => 'ege',
            'Key'    => 'new key',
            'Body'   => 'Hello from MinIO!!'
        ]);
        echo "<pre>"; print_r($insert);echo "</pre>";

        echo('<pre>');print_r($username);echo('</pre>');
        return $this->handleView($this->view($username));
    }

}
