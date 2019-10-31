<?php
namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Answers;
use App\Entity\Category;
use App\Entity\Product;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
<<<<<<< HEAD
            "mode" => $task->getMode(),
            "answers" => [
                    [
                        "id" => "1Q1HHSAG2D9PS4H7W1CVTYSXTM",
                        "question " => [
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
=======
            "mode"=> $task->getMode(),
            "answers"=> $answersArray,
            "status" => $userTask->getStatus(),
>>>>>>> bbee751ee8fdd3bdf7ac29d472e5deb7507639d9
//            "history" => $task->getHistory($user)
        ];
        return $this->handleView($this->view($result));
    }


    /**
     * @Route("/task", name="tasks_show")
     */
    public function getTasksAction()
    {

        $home = new Answers();
        $home->setTaskId('Home');

        $bikes = new Answers();
        $bikes->setName('Bikes');
        $bikes->setParent($home);

        $components = new Answers();
        $components->setName('Components');
        $components->setParent($home);

        $wheelsAndTyres = new Answers();
        $wheelsAndTyres->setName('Wheels & Tyres');
        $wheelsAndTyres->setParent($home);

        $entityManager = $this->getDoctrine()->getEntityManager();

        $entityManager->persist($home);
        $entityManager->persist($bikes);
        $entityManager->persist($components);
        $entityManager->persist($wheelsAndTyres);

        $entityManager->flush();


        $repository = $entityManager->getRepository(Answers::class);
        $category = $repository->findOneBy(['name' => 'Enduro']);

        $product = new Product();
        $product->setName('Enduro Comp 29/6 Fattie Enduro Mountain Bike');
        $product->setCategory($category);
        $this->entityManager->persist($product);

        $product = new Product();
        $product->setName('Kona Process 167 Mountain Bike');
        $product->setCategory($category);
        $this->entityManager->persist($product);

///

        return $this->handleView($this->view([]));
    }

//    private function testTree()
//    {
//        $home = new Answers();
//        $home->setName('Home');
//
//        // level 1: Bikes, Components, Wheels & Tyres
//        $bikes = new Answers();
//        $bikes->setName('Bikes');
//        $bikes->setParent($home);
//
//        $components = new Answers();
//        $components->setName('Components');
//        $components->setParent($home);
//
//        $wheelsAndTyres = new Answers();
//        $wheelsAndTyres->setName('Wheels & Tyres');
//        $wheelsAndTyres->setParent($home);
//
//        $entityManager = $this->getDoctrine()->getEntityManager();
//
//        $entityManager->persist($home);
//        $entityManager->persist($bikes);
//        $entityManager->persist($components);
//        $entityManager->persist($wheelsAndTyres);
//
//        $entityManager->flush();
//
////        // demonstrate using repository functions
////
////        $mountain = new Answers();
////        $mountain->setName('Mountain');
////
////        $repository = $entityManager->getRepository(Answers::class);
////
////        $repository->persistAsLastChildOf($mountain, $bikes);
////
////        $roadAndTimeTrail = new Answers();
////        $roadAndTimeTrail->setName('Road & Time Trail');
////        $repository->persistAsNextSiblingOf($roadAndTimeTrail, $mountain);
////
////        // children of Wheels & Tyres
////
////        $rims = new Answers();
////        $rims->setName('Rims');
////        $repository->persistAsLastChildOf($rims, $wheelsAndTyres);
////
////        $hubs = new Answers();
////        $hubs->setName('Hubs');
////        $repository->persistAsNextSiblingOf($hubs, $rims);
////
////        $tyres = new Answers();
////        $tyres->setName('Tyres');
////        $repository->persistAsNextSiblingOf($tyres, $hubs);
////
////        // children of Mountain
////        $enduro = new Answers();
////        $enduro->setName('Enduro');
////        $repository->persistAsLastChildOf($enduro, $mountain);
////
////        $xc = new Answers();
////        $xc->setName('XC');
////        $repository->persistAsLastChildOf($xc, $mountain);
////
////        $fatBike = new Answers();
////        $fatBike->setName('Fat Bike');
////        $repository->persistAsLastChildOf($fatBike, $mountain);
//    }

}