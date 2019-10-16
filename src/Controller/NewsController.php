<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Post;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
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
