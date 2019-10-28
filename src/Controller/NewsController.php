<?php

namespace App\Controller;

use App\Entity\News;
use App\Service\GrayLog;
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
     */
    public function getNewsAction()
    {
        $logger = GrayLog::getInstance();
        $logger->setFacility('NewsController');
        $logger->setMessage('showNews');
        $logger->send(['full_message' => []], 'info');

        $repository=$this->getDoctrine()->getRepository(News::class);
        $movies=$repository->findall();
        return $this->handleView($this->view($movies));
    }

    /**
     * @Route("/news/{id}", name="news_show")
     */
    public function showNews(News $news)
    {
        $logger = GrayLog::getInstance();
        $logger->setFacility('NewsController');
        $logger->setMessage('showNews');
        $logger->send(['full_message' => 'showNews'], 'info');
        return $this->handleView($this->view($news));
    }

}
