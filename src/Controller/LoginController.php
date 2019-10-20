<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\User;
use App\Event\UpdateFormVkEvent;
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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
        JWTTokenManagerInterface $JWTManager,
        EventDispatcherInterface $eventDispatcher)
    {
        $code = $request->get('code');
        $client = HttpClient::create();
        $response = $client->request('GET', $this->getParameter('vk.api.access.token').$code);
        $content = $response->toArray();
        $accessToken = $content['access_token'];
        $userId = $content['user_id'];
        $email = $content['email'];

        $vkApiVersion = $this->getParameter('vk.api.version');
        $cl = HttpClient::create();
        $res = $cl->request('GET', "https://api.vk.com/method/users.get?access_token=$accessToken&user_ids=$userId&fields=photo_max_orig,city,contacts&v=$vkApiVersion");
        $con = $res->toArray();

        //[id] => 13637121
        //[first_name] => Сергей
        //[last_name] => Руднев
        //[city] => Array
        //(
        //  [id] => 1
        //  [title] => Москва
        //)
        //
        //[photo_max_orig] => https://sun9-41.userapi.com/c852216/v852216494/152c82/faLhaKNAGHM.jpg?ava=1
        //[home_phone] =>

        if(count($con['response'][0]) > 0){
            $fields = $con['response'][0];
            $user = new User();
            $user->setPassword('qwertyuiop')
                ->setVkToken($accessToken)
                ->setVkId($userId)
                ->setEmail($email)
                ->setFirstName( $fields['first_name'])
                ->setLastName( $fields['last_name'])
                ->setVkPhone( $fields['mobile_phone'])
                ->setRoles(['ROLE_USER']);
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();

            $jwt = $JWTManager->create($user);
            $appLink = $this->getParameter('app_link').$jwt;
            echo('<pre>');print_r($appLink);echo('</pre>');die;
            return $this->redirect($appLink, 301);
        }
        
    }

}
