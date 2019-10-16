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
        $vkApiUrl = $this->getParameter('vk.api.redirect.url');
        echo('<pre>');print_r($vkApiUrl);echo('</pre>');
        //$url = "https://oauth.vk.com/authorize?client_id=#{Settings.vk.client_id}&display=mobile&redirect_uri=#{Settings.vk.redirect_uri}&scope=#{Settings.vk.scope}&response_type=code&v=#{Settings.vk.version}";
        return $this->redirect($vkApiUrl, 301);
    }

}
