<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Repository\UserTaskRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    protected $export = false;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="task")
     */
    private $question;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="task")
     */
    private $answer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserTask", mappedBy="task")
     */
    private $userTask;

    /**
     * @ORM\ManyToOne(targetEntity="Answers", inversedBy="tasks")
     */
    private $answers;


    /**
     * @ORM\ManyToOne(targetEntity="Topics", inversedBy="tasks")
     */
    private $topic;


    /**
     * @ORM\ManyToOne(targetEntity="Levels", inversedBy="tasks")
     */
    private $level;


    public function __construct()
    {
        $this->question = new ArrayCollection();
        $this->answer = new ArrayCollection();
        $this->userTask = new ArrayCollection();
    }

    /**
     * @return null|Answers
     */
    public function getAnswers(): ?Answers
    {
        return $this->answers;
    }

    /**
     * @param Answers $answers
     * @return Task
     */
    public function setAnswers(Answers $answers)
    {
        $this->answers = $answers;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     * @return Task
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level): void
    {
        $this->level = $level;
    }


}
