<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string $name
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string $path
     */
    private $path;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="image")
     */
    private $user;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="path")
     * @var File $imageFile
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime $updatedAt
     */
    private $updatedAt;

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function setImageFile(File $path = null) : void
    {
        $this->imageFile = $path;
        if($path){
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function __toString()
    {
        return (string) $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath($path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}