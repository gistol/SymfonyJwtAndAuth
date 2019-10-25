<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
* Class AwsConnector
*
* @ORM\Table(name="AwsConnector")
* @ORM\Entity()
* @Vich\Uploadable()
*/
class AwsConnector
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
     * @return File
     */
    public function getDocumentFile(): File
    {
        return $this->documentFile;
    }

    /**
     * @param File $documentFile
     */
    public function setDocumentFile(File $documentFile): void
    {
        $this->documentFile = $documentFile;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

/**
* @var \DateTime
*
* @ORM\Column(type="datetime")
*/
private $updatedAt;


public function getId(): ?int
{
    return $this->id;
}

    /**
     * @return string
     */
    public function getDocumentFileName(): string
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


}