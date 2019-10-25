<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TriggersRepository")
 */
class Triggers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getReiteration()
    {
        return $this->reiteration;
    }

    /**
     * @param mixed $reiteration
     */
    public function setReiteration($reiteration)
    {
        $this->reiteration = $reiteration;
    }

    /**
     * @return mixed
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @param mixed $sourceType
     */
    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param mixed $sourceId
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return mixed
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * @param mixed $targetType
     */
    public function setTargetType($targetType)
    {
        $this->targetType = $targetType;
    }

    /**
     * @return mixed
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * @param mixed $targetId
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
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
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
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
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }



    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $reiteration;

    /**
     * @ORM\Column(type="string")
     */
    private $currentTrigger;

    /**
     * @return mixed
     */
    public function getCurrentTrigger()
    {
        return $this->currentTrigger;
    }

    /**
     * @param mixed $currentTrigger
     */
    public function setCurrentTrigger($currentTrigger): void
    {
        $this->currentTrigger = $currentTrigger;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $sourceType;

    /**
     * @ORM\Column(type="integer")
     */
    private $sourceId;

    /**
     * @ORM\Column(type="string")
     */
    private $targetType;

    /**
     * @ORM\Column(type="integer")
     */
    private $targetId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="json")
     */
    private $triggerData;

    /**
     * @return mixed
     */
    public function getTriggerData()
    {
        return $this->triggerData;
    }

    /**
     * @param mixed $triggerData
     */
    public function setTriggerData($triggerData)
    {
        $this->triggerData = $triggerData;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}
