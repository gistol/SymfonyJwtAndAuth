<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Post;
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
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    /**
     * @Route("/news", name="news")
     */
    public function getNewsAction()
    {
        $result = [
            [
                "id" => "id",
                "title" => "title",
                "subtitle" => "subtitle",
                "body" => "body",
                "link" => "link",
                "link_text" => "",
                "images" =>
                    [
                    "url" => "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                    "width" => "200",
                    "height" => "200"
                    ]
                ],


            [
                [
                    "id" => "id",
                    "title" => "title",
                    "subtitle" => "subtitle",
                    "body" => "body",
                    "link" => "link",
                    "link_text" => "",
                    "images" =>
                        [
                            "url" => "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                            "width" => "200",
                            "height" => "200"
                        ]
                ]
            ],

        [
            [
                "id" => "id",
                "title" => "title",
                "subtitle" => "subtitle",
                "body" => "body",
                "link" => "link",
                "link_text" => "",
                "images" =>
                    [
                        "url" => "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                        "width" => "200",
                        "height" => "200"
                    ]
            ]
        ],

        [
            [
                "id" => "id",
                "title" => "title",
                "subtitle" => "subtitle",
                "body" => "body",
                "link" => "link",
                "link_text" => "",
                "images" =>
                    [
                        "url" => "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                        "width" => "200",
                        "height" => "200"
                    ]
            ]
        ],

        [
            [
                "id" => "id",
                "title" => "title",
                "subtitle" => "subtitle",
                "body" => "body",
                "link" => "link",
                "link_text" => "",
                "images" =>
                    [
                        "url" => "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                        "width" => "200",
                        "height" => "200"
                    ]
            ]
        ],

        [
            [
                "id" => "id",
                "title" => "title",
                "subtitle" => "subtitle",
                "body" => "body",
                "link" => "link",
                "link_text" => "",
                "images" =>
                    [
                        "url" => "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                        "width" => "200",
                        "height" => "200"
                    ]
            ]
        ]

        ];





//        $repository=$this->getDoctrine()->getRepository(News::class);
//        $movies=$repository->findall();

        return $this->handleView($this->view($result));
    }

    /**
     * @Route("/news/{id}", name="news_show")
     */
    public function showNews(News $news)
    {

        return $this->handleView($this->view($news));
    }

}
