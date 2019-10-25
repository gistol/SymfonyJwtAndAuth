<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ResourceCategoriesRepository")
 */
class ResourceCategories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     */
    private $title;


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
    private $videoFileName;

    /**
     * @ORM\Column(type="string")
     */
    private $videoContentType;

    /**
     * @ORM\Column(type="integer")
     */
    private $videoFileSize;

    /**
     * @ORM\Column(type="datetime")
     */
    private $videoUpdatedAt;

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
    private $imageMeta;

    public function getId(): ?int
    {
        return $this->id;
    }
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
    public function getImageFileName()
    {
        return $this->imageFileName;
    }

    /**
     * @param mixed $imageFileName
     */
    public function setImageFileName($imageFileName)
    {
        $this->imageFileName = $imageFileName;
    }

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
    public function getVideoFileName()
    {
        return $this->videoFileName;
    }

    /**
     * @param mixed $videoFileName
     */
    public function setVideoFileName($videoFileName)
    {
        $this->videoFileName = $videoFileName;
    }

    /**
     * @return mixed
     */
    public function getVideoContentType()
    {
        return $this->videoContentType;
    }

    /**
     * @param mixed $videoContentType
     */
    public function setVideoContentType($videoContentType)
    {
        $this->videoContentType = $videoContentType;
    }

    /**
     * @return mixed
     */
    public function getVideoFileSize()
    {
        return $this->videoFileSize;
    }

    /**
     * @param mixed $videoFileSize
     */
    public function setVideoFileSize($videoFileSize)
    {
        $this->videoFileSize = $videoFileSize;
    }

    /**
     * @return mixed
     */
    public function getVideoUpdatedAt()
    {
        return $this->videoUpdatedAt;
    }

    /**
     * @param mixed $videoUpdatedAt
     */
    public function setVideoUpdatedAt($videoUpdatedAt)
    {
        $this->videoUpdatedAt = $videoUpdatedAt;
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
}