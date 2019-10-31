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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $courseId;

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * @param mixed $courseId
     */
    public function setCourseId($courseId): void
    {
        $this->courseId = $courseId;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $imageFileName;

    /**
     * @return mixed
     */
    public function getImageContentType()
    {
        return $this->imageContentType;
    }

    /**
     * @param mixed $imageContentType
     */
    public function setImageContentType($imageContentType)
    {
        $this->imageContentType = $imageContentType;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $imageContentType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $imageFileSize;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $imageUpdatedAt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $imageMeta;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserLevels", mappedBy="levels")
     */
    private $userLevels;

    public function getId(): ?int
    {
        return $this->id;
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
     * @return mixed
     */
    public function getImageFileSize()
    {
        return $this->imageFileSize;
    }

    /**
     * @param mixed $imageFileSize
     */
    public function setImageFileSize($imageFileSize)
    {
        $this->imageFileSize = $imageFileSize;
    }


    /**
     * @return mixed
     */
    public function getImageUpdatedAt()
    {
        return $this->imageUpdatedAt;
    }

    /**
     * @param mixed $imageUpdatedAt
     */
    public function setImageUpdatedAt($imageUpdatedAt)
    {
        $this->imageUpdatedAt = $imageUpdatedAt;
    }

    /**
     * @return mixed
     */
    public function getImageMeta()
    {
        return $this->imageMeta;
    }

    /**
     * @param mixed $imageMeta
     */
    public function setImageMeta($imageMeta)
    {
        $this->imageMeta = $imageMeta;
    }

    /**
     * @return mixed
     */
    public function getUserLevels()
    {
        return $this->userLevels;
    }

    /**
     * @param mixed $userLevels
     */
    public function setUserLevels($userLevels)
    {
        $this->userLevels = $userLevels;
    }

}