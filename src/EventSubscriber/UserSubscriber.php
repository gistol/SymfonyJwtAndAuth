<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Event\UpdateFormVkEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpClient\HttpClient;

class UserSubscriber implements EventSubscriberInterface
{

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            UpdateFormVkEvent::NAME => 'onUserRegister'
        ];
    }

    /**
     * @param UpdateFormVkEvent $updateFormVkEvent
     */
    public function onUserRegister(UpdateFormVkEvent $updateFormVkEvent)
    {
        $vkId = $updateFormVkEvent->getRegisteredUser()->getVkId();
        $vkApiVersion = $this->getParameter('vk.api.version');

        $client = HttpClient::create();
        $response = $client->request('GET', "https://api.vk.com/method/users.get?user_ids=$vkId&fields=photo_max_orig,city,contacts&v=$vkApiVersion");
        $content = $response->toArray();

        echo('<pre>');print_r($content);echo('</pre>');die;
        $user = new User();
        $user
            ->setFirstName( $content['first_name'])
            ->setLastName( $content['last_name'])
            ->setVkPhone( $content['mobile_phone'])
        ;

        $this->em->persist($user);
        $this->em->flush();
    }
}