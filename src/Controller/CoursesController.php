<?php

namespace App\Controller;

use App\Entity\Courses;
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
class CoursesController extends AbstractFOSRestController
{
    /**
     * @Route("/courses/", name="courses")
     */
    public function getCoursesAction()
    {
        $result = [
            [
                "id" => "1Q1HHS924VHET7PYWDTQFMS054",
        "title" => "Базовый Курс",
        "description" => "Old project database",
        "progress" => 0
            ],
            [
                "id" => "1Q1HHS92F1ZT29DFRNSKJSBVQW",
        "title" => "Профильный Курс",
        "description" => "Old project database",
        "progress" => 0
            ],
            [
                "id" => "1RWWJEV8GX11XQQYY82H4V98RW",
        "title" => "Keep Summer safe.",
        "description" => "Antediluvian non-euclidean indescribable dank gibbous cat charnel madness. Non-euclidean loathsome fungus lurk foetid blasphemous fainted amorphous. Eldritch spectral hideous.",
        "progress" => 0
            ]

        ];

        return $this->handleView($this->view($result));
    }

    /**
     * @Route("/courses/{id}", name="courses_show")
     */
    public function showCourses(Courses $courses)
    {

        return $this->handleView($this->view($courses));
    }
}