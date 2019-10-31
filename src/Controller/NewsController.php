<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\News;
use App\Repository\NewsRepository;
use App\Repository\UserTaskRepository;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\GrayLog;
use App\Service\S3Service;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;


/**
 * @Route("/api",name="api_")
 */
class NewsController extends AbstractFOSRestController
{

    /**
     * @Route("/news", name="news")
     * @return Response
     */
    public function getNewsAction(NewsRepository $newsRepository, S3Service $s3Service)
    {
        $newsRepa = $newsRepository->findAll();

        $newsResult = [];


        foreach ($newsRepa as $news) {

            $doc = [
                "id" => $news->getId(),
                "title" => $news->getTitle(),
                "subtitle" => $news->getSubtitle(),
                "body" => $news->getTitle(),
                "link" => $news->getLink(),
                "link_text" => $news->getLinkText(),
            ];


            /*
             * если есть картинка к новости то сходим в s3 за ней
             */
            if ($news->getMyDocument()) {
                $cmd = $s3Service->getS3Client()->getCommand('GetObject', [
                    'Bucket' => $s3Service->getBucket(),
                    'Key' => $news->getMyDocument()->getDocumentFileName()
                ]);

                /* пока возмем 20 минут на загрузку картинки без авторизации */
                $request = $s3Service->getS3Client()->createPresignedRequest($cmd, '+20 minutes');


                echo "<pre>";
                print_r($news->getMyDocument()->getDocumentFile());
                echo "</pre>";
                echo "<pre>";
                print_r($request);
                echo "</pre>";

                $doc['images'] = [
                    "url" => $request->getUri(),
                    "width" => "200",
                    "height" => "200"
                ];
            }

            $newsResult[] = $doc;
        }
    }

    /**
     * @Route("/news/{id}", name="news_show")
     */
    public function showNews(Courses $news)
    {
        return $this->handleView($this->view($news));
    }

}
