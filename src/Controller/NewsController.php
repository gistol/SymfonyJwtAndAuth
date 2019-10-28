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

        $this->logger->error('Some error occurred while doing sometihng.', [
            'some_value'    => 'ABC',
            'another_value' => 1532,
            'facility' => 'EGE_SYMFONY',
        ]);

        $this->logger->log(Logger::INFO, 'TEST_EGE_RF');

        $repository=$this->getDoctrine()->getRepository(News::class);
        $movies=$repository->findall();

        return $this->handleView($this->view($movies));
    }

    /**
     * @Route("/news/{id}", name="news_show")
     */
    public function showNews(News $news)
    {

        return $this->handleView($this->view($news));
    }

}
