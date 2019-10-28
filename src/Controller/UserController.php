<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\News;
use App\Entity\User;
use App\Repository\DocumentRepository;
use App\Repository\UserRepository;
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
     * @Route("/news/{id}", name="news_show")
     */
    public function showNews(News $news)
    {
        return $this->handleView($this->view($news));
    }

    /**
     * @Route("/me", name="me")
     */
    public function getUserAction(Security $security,
        DocumentRepository $documentRepository,
        UserRepository $userRepository,
        S3Service $s3Service)
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $user = $userRepository->findOneByEmailField($user->getEmail());

        if($user) {
            $cmd = $s3Service->getS3Client()->getCommand('GetObject', [
                'Bucket' => $s3Service->getBucket(),
                'Key' => $user->getMyDocument()->getDocumentFileName()
            ]);

            $request = $s3Service->getS3Client()->createPresignedRequest($cmd, '+20 minutes');
            echo('<pre>');print_r((string)$request->getUri());echo('</pre>');
        }

        return $this->handleView($this->view([
            'FILE' => '123',
            'FILE1' => '123',
            'FIL2E' => '123',
        ]));
    }

}
