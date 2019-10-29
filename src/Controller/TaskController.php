<?php
namespace App\Controller;

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
     * @Route("/task/{id}", name="task_show")
     */
    public function showTask(Task $task)
    {
        $result = [
            [
                "id" => "1Q1HHSACG9KY4ZTBQK33H4WWX0",
                "number" => 2,
                "questions" => [
                    [
                        "id" => "1Q1HHSACZN78X2BBTZ59ST9Y8C",
                        "text" => "тест2",
                        "mode" => "text"
                    ]
                ],
                "mode"=> "matrix",
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
                    ],
            ],
            [
                "id" => "1Q1HHSANAG61A9ADBCF5T6MER4",
                "number" => 2,
                "questions" => [
                    [
                        "id" => "1Q1HHSANS6PSDYBQ7Q97D83H0M",
                        "text" => "тест2",
                        "mode" => "text"
                    ]
                ],
                "mode"=> "matrix",
                "answers"=>
                    [
                        [
                            "id" => "1Q1HHSDG1SMFQHAM94GHR3CCHM",
                            "question "=> [
                                [
                                    "id" => "1Q1HHSDGJ7NNWYYTWHVYXDY2G8",
                                    "text" => "1",
                                    "mode" => "text"
                                ]
                            ]
                        ]
                    ]
            ],
            "status" => "new",
            "history" => []
        ];

        return $this->handleView($this->view($result));
    }
}