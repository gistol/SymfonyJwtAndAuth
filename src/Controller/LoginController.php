<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\HttpClient\HttpClient;
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
    public function getLoginAction()
    {
        $vkApiUrl = $this->getParameter('vk.api.redirect.url');
        return $this->redirect($vkApiUrl, 301);
    }

    /**
     * @Route("/vk_callback", name="vk_callback")
     */
    public function getVkCallback(Request $request, UserManagerInterface $userManager)
    {
        $code = $request->get('code');

        $client = HttpClient::create();
        $response = $client->request('GET', $this->getParameter('vk.api.access.token').$code);
        $content = $response->toArray();
        $accessToken = $content['access_token'];
        $userId = $content['user_id'];


        $user = new User();
        $user
            ->setUsername($username)
            ->setPlainPassword($password)
            ->setEmail($email)
            ->setEnabled(true)
            ->setRoles(['ROLE_USER'])
            ->setSuperAdmin(false)
        ;

        try {
            $userManager->updateUser($user);
        } catch (\Exception $e) {
            return new JsonResponse(["error" => $e->getMessage()], 500);
        }

//        user = User.find_or_create_by! vk_id: vk_id
//        user.vk_token = token
//        user.save!


        //user.update_form_vk

        //jwt = Knock::AuthToken.new payload: { sub: user.id }

//        "egeapp://auth?jwt=#{jwt}"

        return $this->redirect($vkApiUrl, 301);
    }



}
