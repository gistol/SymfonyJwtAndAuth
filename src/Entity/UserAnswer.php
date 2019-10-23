<?php

namespace App\Entity;


use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserAnswerRepository")
 */
class UserAnswer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userId;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $answerId;

    /**
     * @return mixed
     */
    public function getAnswerId()
    {
        return $this->answerId;
    }

    /**
     * @param mixed $answerId
     */
    public function setAnswerId($answerId)
    {
        $this->answerId = $answerId;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $status;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $userTaskId;

    /**
     * @return mixed
     */
    public function getUserTaskId()
    {
        return $this->userTaskId;
    }

    /**
     * @param mixed $userTaskId
     */
    public function setUserTaskId($userTaskId): void
    {
        $this->userTaskId = $userTaskId;
    }



    public function getId(): ?int
    {
        return $this->id;
    }
}
