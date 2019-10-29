<?php

namespace App\Controller;

use App\Entity\Question;
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
class QuestionController extends AbstractFOSRestController
{
    /**
     * @Route("/question", name="question")
     */
    public function getQuestionAction()
    {
        $result = [

        ];

}
}