<?php
namespace App\Controller;

use App\Entity\Resources;
use App\Entity\Task;
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
class TaskController extends AbstractFOSRestController
{

    /**
     * @param Task $task
     * @Route("/task/{id}", name="task_show")
     * @return Response
     */
    public function getResourcesAction(Task $task)
    {

        $questions = $task->getQuestion();
        echo "<pre>"; print_r($questions);echo "</pre>";

        $result = [
            "id" => $task->getId(),
            "number" => $task->getNumber(),
            "questions" => [
                [
                    "id" => "1Q1HHSACZN78X2BBTZ59ST9Y8C",
                    "text" => "тест2",
                    "mode" => "text"
                ],
                [
                    "id" => "1Q1HHSACZN78X2BBTZ59ST9Y8C",
                    "text" => "тест2",
                    "mode" => "text"
                ],
            ],
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
            "status" => '',
            "history" => []
        ];
        return $this->handleView($this->view($result));
    }


}