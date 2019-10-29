<?php

namespace App\Controller;

use App\Entity\Levels;
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
     */
    public function getLevelsAction()
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
                "id" => "1RWWJEVD456VVJ3KV7EW99ERB8",
                "number" => 1,
                "title" => "Hello Jerry, come to rub my face in urine again?",
                "description" => "Hideous dank stygian indescribable loathsome amorphous furtive. Unnamable amorphous gibbous indescribable. Singular stygian antediluvian charnel. Unmentionable antediluvian non-euclidean.",
                "status" => "new"
            ],

            [
                "id" => "1Q1HJ7SD13GFKAM0F9GV7C2Q6R",
                 "number" => 1,
                 "title" => "Вариант 1",
                 "description" => "вариант ЕГЭ 2019",
                 "status" => "new",
                 "score" => 0
            ]
        ];

        return $this->handleView($this->view($result));
    }
    /**
     * @Route("/levels/{id}", name="levels_show")
     */
    public function showLevels(Levels $levels)
    {
        return $this->handleView($this->view($levels));
    }

}