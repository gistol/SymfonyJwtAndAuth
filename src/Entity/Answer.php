<?php

namespace App\Entity;


use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswerRepository")
 */
class Answer
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    protected $isCorrect = false;

    /**
     * @ORM\Column(type="integer")
     */
    private $taskId;

    /**
     * @ORM\Column(type="integer")
     */
    private $parentId;

    /**
     * @ORM\Column(type="integer")
     */
    private $lft;

    /**
     * @ORM\Column(type="integer")
     */
    private $rgt;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $question;

    /**
     * @return mixed
     */
    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     * @return Answer
     */
    public function setQuestion(Question $question)
    {
        $this->question = $question;
        return  $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * @param mixed $isCorrect
     * @return Answer
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @param mixed $taskId
     * @return Answer
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * @param mixed $lft
     * @return Answer
     */
    public function setLft($lft)
    {
        $this->lft = $lft;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * @param mixed $rgt
     * @return Answer
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
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
     * @return Answer
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
     * @return Answer
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param mixed $parentId
     * @return Answer
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    public function showAction($id)
    {
        $answer = $this->getDoctrine()
            -> getRepository(Answer::class)
            ->find($id);

        $questionName = $answer->getQuestion()->getAnswers();
    }

    public function showAnswerAction($id)
    {
        $question = $this->getDoctrine()
            ->getRepository(Question::class)
            ->find($id);

        $answer = $question->getProducts();
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="answers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $task;

    public function getTask(): Task
    {
        return $this->task;
    }

    public function setTask(Task $task)
    {
        $this->task = $task;
    }








}
