<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity()
 * @Vich\Uploadable()
 */
class Document
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentFileName;

    /**
     * @var File
     * @Vich\UploadableField(mapping="document", fileNameProperty="documentFileName")
     */
    private $documentFile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getDocumentFile(): ?\Symfony\Component\HttpFoundation\File\File
    {
        return $this->documentFile;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $documentFile
     */
    public function setDocumentFile(\Symfony\Component\HttpFoundation\File\File $documentFile): void
    {
        $this->documentFile = $documentFile;
    }

    /**
     * @return string
     */
    public function getDocumentFileName(): ?string
    {
        return $this->documentFileName;
    }

    /**
     * @param string $documentFileName
     */
    public function setDocumentFileName(string $documentFileName): void
    {
        $this->documentFileName = $documentFileName;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return \App\Entity\Document
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}