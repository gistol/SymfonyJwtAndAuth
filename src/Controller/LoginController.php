<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\News;
use App\Entity\User;
use App\Event\UpdateFormVkEvent;
use App\Repository\DocumentRepository;
use App\Repository\UserRepository;
use App\Service\S3Service;
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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginController extends AbstractFOSRestController
{
    /**
     * @Route("/users/auth_vk", name="auth_vk")
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
        JWTTokenManagerInterface $JWTManager,
        UserRepository $userRepository,
        DocumentRepository $documentRepository,
        S3Service $s3Service,
        UserPasswordEncoderInterface $encoder,
        EventDispatcherInterface $eventDispatcher)
    {

        $s3 = $s3Service->getS3Client();

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

        if(count($con['response'][0]) > 0){
            $fields = $con['response'][0];
            $user = $userRepository->findOneByEmailField($email);
            if(!$user) {
                $user = new User();
            }
            $encoded = $encoder->encodePassword($user, 'qwertyuiop');
            $user->setPassword($encoded)
                ->setVkToken($accessToken)
                ->setVkId($userId)
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime())
                ->setEmail($email)
                ->setFirstName( $fields['first_name'])
                ->setLastName( $fields['last_name'])
                ->setVkPhone( $fields['home_phone'])
                ->setRoles(['ROLE_USER']);

            if(strlen($fields['photo_max_orig']) > 0) {
                $photo_max_orig = basename(explode('?',$fields['photo_max_orig'])[0]);
                $s3 = $s3->upload(
                    'ege',
                    $photo_max_orig,
                    file_get_contents($fields['photo_max_orig']),
                    'public-read'
                );
                if($s3) {
                    $doc = new Document();
                    $doc->setDocumentFileName($photo_max_orig);
                    $doc->setUpdatedAt(new \DateTime);
                    $user->setMyDocument($doc);
                }
            }

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();

            $jwt = $JWTManager->create($user);
            $appLink = $this->getParameter('app_link').$jwt;
            return $this->redirect($appLink, 301);
        }
    }
}
