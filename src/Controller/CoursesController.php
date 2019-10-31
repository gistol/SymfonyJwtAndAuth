<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\Post;
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
class CoursesController extends AbstractFOSRestController
{
    /**
     * @param Courses $courses
     * @Route("/courses", name="courses")
     * @return Response
     */
    public function getCoursesAction(Courses $courses, CoursesRepository $coursesRepository)
    {

        $courses = $coursesRepository->findAll();
        foreach ($courses as $cours) {
            print_r($cours->getTitle(), true);
        }
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
     * @param Courses $courses
     * @Route("/courses/{id}", name="courses_show")
     * @return Response
     */
    public function showCourses(Courses $courses, CoursesRepository $coursesRepository)
    {
        $result = [
            [
                "id" => "1Q1HHS924VHET7PYWDTQFMS054",
                "title" => "Базовый Курс",
                "description" => "Old project database",
                "progress" => 0,
                "levels" => [
                    [
                        "id" => "1Q1HHSEARFGAM5Q94WTS2VHVSR",
                        "number" => 1,
                        "title" => "1",
                        "description" => null,
                        "status" => "new",
                        "correct_answers" => 0,
                        "incorrect_answers" => 0,
                        "total_tasks" => 5,
                        "completed_tasks" => 0
                    ],
                    [
                        "id" => "1Q1HHT62H46KSC2DP5NWWHRBWM",
                        "number" => 2,
                        "title" => "2",
                        "description" => null,
                        "status" => "new",
                        "correct_answers" => 0,
                        "incorrect_answers" => 0,
                        "total_tasks" => 5,
                        "completed_tasks" => 0
                    ],
                ],
            ]

        ];
        return $this->handleView($this->view($result));
    }

    /**
     * @param Courses $courses
     * @Route("/courses/{id}/levels", name="coursesLevels_show")
     * @return Response
     */
    public function showCoursesLevels(Courses $courses, LevelsRepository $levelsRepository)
    {


        $result = [
            [

                "id" => "1Q1HHSEARFGAM5Q94WTS2VHVSR",
                "number" => 1,
                "title" => "1",
                "description" => null,
                "status" => "new"

            ],
            [
                "id" => "1Q1HHT62H46KSC2DP5NWWHRBWM",
                "number" => 2,
                "title" => "2",
                "description" => null,
                "status" => "new"
            ]
        ];
        return $this->handleView($this->view($result));
    }
}