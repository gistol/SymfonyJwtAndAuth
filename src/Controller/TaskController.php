<?php
namespace App\Controller;

use App\Entity\Resources;
use App\Entity\Task;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\UserTask;
use App\Repository\UserRepository;
use App\Repository\UserTaskRepository;
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
class TaskController extends AbstractFOSRestController
{

    /**
     * @param Task $task
     * @Route("/task/{id}", name="task_show")
     * @return Response
     */
    public function getResourcesAction(Task $task,
    UserTaskRepository $userTaskRepository)
    {

        /** @var User $user */
        $user = $this->getUser();

        /** @var UserTask $userTasks */
        $userTasks = $userTaskRepository->findOneBy(['userId' => $user->getId(), 'taskId'=>$task->getId()]);

        $questions = $task->getQuestion();
        $questionsArray = [];
        foreach ($questions as $question) {
            $questionsArray[] = [
                "id" => $question->getId(),
                "text" => $question->getText(),
                "mode" => $question->getMode()
            ];
        }

        $result = [
            "id" => $task->getId(),
            "number" => $task->getNumber(),
            "questions" => $questionsArray,
            "mode"=> $task->getMode(),
            "answers"=> [
                    [
                        "id" => "1Q1HHSAG2D9PS4H7W1CVTYSXTM",
                        "question "=> [
                            [
                                "id" => "1Q1HHSAGTFY3NSN6XJXGZ3XCZW",
                                "text" => "1",
                                "mode" => "text"
                            ],
                        ],
                    ],
                    [
                        "id" => "1Q1HHSAG2D9PS4H7W1CVTYSXTM",
                        "question "=> [
                            [
                                "id" => "1Q1HHSAGTFY3NSN6XJXGZ3XCZW",
                                "text" => "1",
                                "mode" => "text"
                            ],
                        ],
                    ],
                ],
            "status" => $userTasks->getStatus(),
//            "history" => $task->getHistory($user)
        ];
        return $this->handleView($this->view($result));
    }


}