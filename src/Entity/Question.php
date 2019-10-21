<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\Text;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */

class Question
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
    private $sourceType;

    /**
     * @ORM\Column(type="integer")
     */
    private $sourceId;

    /**
     * @ORM\Column(type="string")
     */
    private $mode;

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
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

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

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="parentId")
     */
    private $answers;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * @param string $sourceType
     * @return Question
     */
    public function setSourceType(string $sourceType)
    {
        $this->sourceType = $sourceType;
        return $this;
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
     * @return Question
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
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
     * @return Question
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
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
     * @return Question
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
     * @return Question
     */
    public function setImageContentType(string $imageContentType)
    {
        $this->imageContentType = $imageContentType;
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
     * @return Question
     */
    public function setImageFileSize($imageFileSize)
    {
        $this->imageFileSize = $imageFileSize;
        return $this;
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
     * @return Question
     */
    public function setImageUpdatedAt($imageUpdatedAt)
    {
        $this->imageUpdatedAt = $imageUpdatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Question
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     * @return Question
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
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
     * @return Question
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
     * @return Question
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageMeta(): ?string
    {
        return $this->imageMeta;
    }

    /**
     * @param string $imageMeta
     * @return Question
     */
    public function setImageMeta(string $imageMeta)
    {
        $this->imageMeta = $imageMeta;
        return $this;
    }


    /* public function __construct()
     {
         $this->answers = new ArrayCollection();
     }

     public function getAnswers()
     {
         return $this->answers;
     }*/
}


















=======
    //public function __construct()
    //{
    //    $this->answer = new ArrayCollection();
    //
    //}
>>>>>>> 24323cfcc5172367c9c2d9b69b232e8f8ac416df
}