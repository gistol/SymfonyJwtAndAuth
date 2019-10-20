<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Post;
use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Security;


/**
 * @Route("/api",name="api_")
 */
class UserController extends AbstractFOSRestController
{
    /**
     * @Route("/me", name="me")
     */
    public function getUserAction(Security $security)
    {
        $username = $this->getUser()->getUsername();
        echo('<pre>');print_r($username);echo('</pre>');
        return $this->handleView($this->view($username));
    }

}
