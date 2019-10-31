<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\Task;
use App\Entity\Topics;
use App\Repository\CoursesRepository;
use App\Repository\LevelsRepository;
use App\Repository\TaskRepository;
use App\Repository\TopicsRepository;
use App\Repository\UserLevelsRepository;
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
class LevelsController extends AbstractFOSRestController
{

    /**
     * @Route("/levels", name="levels")
     * @return Response
     */
    public function getLevelsAction(LevelsRepository $levelsRepository)
    {
        $levels = $levelsRepository->findAll();
        $levelsResult = [];
        foreach ($levels as $level) {
            $levelsResult[] = [
                "id" => $level -> getId(),
                "number" => $level -> getNumber(),
                "title" => $level -> getTitle(),
                "description" => $level -> getDescription(),
                "status" => '',
                "score" => ''
            ];
        }

        return $this->handleView($this->view($levelsResult));
    }
    /**
     * @param Levels $levels
     * @Route("/levels/{id}/tasks", name="levelsTasks_show")
     * @return Response
     */
    public function showLevelsTasks(Topics $topics, TopicsRepository $topicsRepository, Levels $levels, LevelsRepository $levelsRepository, TaskRepository $taskRepository, Task $task)
    {
        $topics = $topicsRepository->findAll();
        $topicsResult = [];
        foreach ($topics as $topic) {
            $topicsResult[] = [
            [
                "id" => $topic -> getId(),
        "title" => $topic -> getTitle(),
        "tasks" => [
            [
                "id" => "1Q1HHSEPPG9HGP0TV3RM6VYRMG",
                "number" => 1,
                "mode" => "matrix",
                "status" => "new"
            ],
                   ],
            ]

        ];
        return $this->handleView($this->view($tasksResult));
    }

}