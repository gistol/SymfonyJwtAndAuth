<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LevelsRepository")
 */
class Levels
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
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $courseId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string")
     */
    private $imageFileName;

    /**
     * @ORM\Column(type="string")
     */
    private $imageContentType;

    /**
     * @ORM\Column(type="integer")
     */
    private $imageFileSize;

    /**
     * @ORM\Column(type="datetime")
     */
    private $imageUpdatedAt;

    /**
     * @ORM\Column(type="string")
     */
    private $imageMeta;

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
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Levels
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Levels
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function courseId()
    {
        return $this->courseId;
    }

    /**
     * @return string
     */
    public function getCourseId(): ?string
    {
        return $this->courseId;
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
     * @return Levels
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
     * @return Levels
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageFileName(): ?string
    {
        return $this->imageFileName;
    }

    /**
     * @param string $imageFileName
     * @return Levels
     */
    public function setImageFileName(string $imageFileName)
    {
        $this->imageFileName = $imageFileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageContentType(): ?string
    {
        return $this->imageContentType;
    }

    /**
     * @param string $imageContentType
     * @return Levels
     */
    public function setImageContentType(string $imageContentType)
    {
        $this->imageFileName = $imageContentType;
        return $this;
    }







}