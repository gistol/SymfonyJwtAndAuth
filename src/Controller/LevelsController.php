<?php

namespace App\Controller;

use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\Task;
use App\Entity\Topics;
use App\Entity\UserLevels;
use App\Entity\UserTask;
use App\Repository\CoursesRepository;
use App\Repository\LevelsRepository;
use App\Repository\TaskRepository;
use App\Repository\TopicsRepository;
use App\Repository\UserLevelsRepository;
use App\Repository\UserTaskRepository;
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

//    public function getLevelsAction(LevelsRepository $levelsRepository, UserTask $userTask, UserTaskRepository $userTaskRepository)

//    {
//        $levels = $levelsRepository->findAll();
//        $levelsResult = [];
//        foreach ($levels as $level) {
//            $level->
//            $levelsResult[] = [
//                "id" => $level->getId(),
//                "number" => $level->getNumber(),
//                "title" => $level->getTitle(),
//                "description" => $level->getDescription(),
//                "status" => $userTask->getStatus(),
//                "score" => "CorrectAnswersNumber*5"
//            ];
//        }
//
//        return $this->handleView($this->view($levelsResult));
//    }

    /**
     * @param Levels $levels
     * @Route("/levels/{id}/tasks", name="levelsTasks_show")
     * @return Response
     */
    public function showLevelsTasks(Topics $topics,
                                    TopicsRepository $topicsRepository,
                                    Levels $levels,
                                    LevelsRepository $levelsRepository,
                                    TaskRepository $taskRepository,
                                    Task $task,
                                    UserTaskRepository $userTaskRepository,
                                    UserTask $userTask
    ){
        $topics = $topicsRepository->findAll();
        $topicsResult = [];
        foreach ($topics as $topic) {
            $topicsResult[] = [
                [
                    "id" => $topic->getId(),
                    "title" => $topic->getTitle(),
                    "tasks" => [
                        [
                            "id" => $task->getId(),
                            "number" => $task->getNumber(),
                            "mode" => $task->getMode(),
                            "status" => $userTask->getStatus()
                        ],
                    ],
                ]
            ];
        }

        return $this->handleView($this->view($topicsResult));
    }
}