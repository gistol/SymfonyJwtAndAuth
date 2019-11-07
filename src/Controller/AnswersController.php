<?php

namespace App\Controller;

use App\Entity\Answers;
use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\Post;
use App\Repository\AnswersRepository;
use App\Repository\CoursesRepository;
use App\Repository\LevelsRepository;
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
class AnswersController extends AbstractFOSRestController
{
    /**
     * @param Answers $answers
     * @Route("/answers", name="answers")
     * @return Response
     */
    public function getCoursesAction(Answers $answers, AnswersRepository $answersRepository)
    {
        $result = [
            [

            ]
        ];
    }
}