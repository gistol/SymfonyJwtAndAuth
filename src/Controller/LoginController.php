<?php

namespace App\Controller;

use App\Entity\News;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;


class LoginController extends AbstractFOSRestController
{
    /**
     * @Route("/auth_vk", name="auth_vk")
     */
    public function getNewsAction()
    {

        $env = [
            "FIRST" => $_ENV['JWT_SECRET_KEY']
        ];


        return $this->handleView($this->view($env));
    }

}
