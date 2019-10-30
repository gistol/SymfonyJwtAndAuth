<?php
namespace App\Controller;

use App\Entity\Resources;
use App\Entity\Task;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\UserTask;
use App\Repository\AnswerRepository;
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
    public function getResourcesAction(Task $task, UserTaskRepository $userTaskRepository)
    {
        /** @var User $user */
        $user = $this->getUser();

        $answersArray = [];
        $answers = $task->getAnswer();
        foreach ($answers as $answer) {
            $question = [
                "id" => $answer->getQuestion()->getId(),
                "text" => $answer->getQuestion()->getText(),
                "mode" => $answer->getQuestion()->getMode()
            ];
            $answersArray[] = [
                "id" => $answer->getId(),
                "question"=> [$question],
            ];
        }

        $questions = $task->getQuestion();
        $questionsArray = [];
        foreach ($questions as $question) {
            $questionsArray[] = [
                "id" => $question->getId(),
                "text" => $question->getText(),
                "mode" => $question->getMode()
            ];
        }

        /** @var UserTask $userTask */
        $userTask = $userTaskRepository->findOneBy(['userId' => $user->getId(), 'taskId'=>$task->getId()]);

        $result = [
            "id" => $task->getId(),
            "number" => $task->getNumber(),
            "questions" => $questionsArray,
            "mode"=> $task->getMode(),
            "answers"=> $answersArray,
            "status" => $userTask->getStatus(),
//            "history" => $task->getHistory($user)
        ];
        return $this->handleView($this->view($result));
    }


}