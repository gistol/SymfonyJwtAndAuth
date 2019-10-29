<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Repository\UserTaskRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $topicId;

    /**
     * @ORM\Column(type="string")
     */
    private $mode;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $levelId;

    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    protected $export = false;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="task")
     */
    private $question;

    private $userTaskRepository;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="answer")
     */
    private $answer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserTask", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userTask;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    public function __construct()
    {
        $this->question = new ArrayCollection();
        $this->answer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserTask()
    {
        return $this->userTask;
    }

    /**
     * @param mixed $userTask
     */
    public function setUserTask($userTask): void
    {
        $this->userTask = $userTask;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return Task
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * @param mixed $topicId
     * @return Task
     */
    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     * @return Task
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     * @return Task
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     * @return Task
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLevelId()
    {
        return $this->levelId;
    }

    /**
     * @param mixed $levelId
     * @return Task
     */
    public function setLevelId($levelId)
    {
        $this->levelId = $levelId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExport()
    {
        return $this->export;
    }

    /**
     * @param mixed $export
     * @return Task
     */
    public function setExport($export)
    {
        $this->export = $export;
        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswer()
    {


        return $this->answer;
    }

    /**
     * @param User $user
     * @return array
     */
    public function getStatus($user)
    {
//        $q = $this->createQueryBuilder('c')
//            ->where('c.email = :email')
//            ->andWhere('c.store_id = :store_id')
//            ->setParameter('email', $email)
//            ->setParameter('store_id', $store_id)
//            ->getQuery();

        return [];
    }


    /**
     * @param User $user
     * @return array
     */
    public function getHistory($user)
    {
        /** TODO  */
        return [];
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}
