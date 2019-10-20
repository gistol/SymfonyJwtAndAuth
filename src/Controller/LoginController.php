<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\UserBundle\Model\UserManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpClient\HttpClient;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class LoginController extends AbstractFOSRestController
{
    /**
     * @Route("/auth_vk", name="auth_vk")
     */
    public function getLoginAction()
    {
        $vkApiUrl = $this->getParameter('vk.api.redirect.url');
        return $this->redirect($vkApiUrl, 301);
    }

    /**
     * @Route("/vk_callback", name="vk_callback")
     */
    public function getVkCallback(Request $request,
        UserManagerInterface $userManager,
        JWTTokenManagerInterface $JWTManager)
    {
        $code = $request->get('code');

        $client = HttpClient::create();
        $response = $client->request('GET', $this->getParameter('vk.api.access.token').$code);
        $content = $response->toArray();
        $accessToken = $content['access_token'];
        $userId = $content['user_id'];

        $user = new User();
        $user
            ->setVkToken($accessToken)
            ->setVkId($userId)
            ->setRoles(['ROLE_USER'])
        ;

        try {
            $userManager->createUser($user);
        } catch (\Exception $e) {
            $jwt = $JWTManager->create($user);
            $appLink = $this->getParameter('app_link').$jwt;
            return $this->redirect($appLink, 301);
        }
    }

}
