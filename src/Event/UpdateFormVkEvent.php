<?php

namespace App\Event;

use App\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;

class UpdateFormVkEvent extends Event
{
    public const NAME = 'update.vk.form';

    /**
     * @var User
     */
    private $registeredUser;

    /**
     * @param User $registeredUser
     */
    public function __construct(User $registeredUser)
    {
        $this->registeredUser = $registeredUser;
    }

    /**
     * @return User
     */
    public function getRegisteredUser(): User
    {
        return $this->registeredUser;
    }
}