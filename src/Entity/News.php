<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $subtitle;

    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    protected $isPublished = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $pushText;

    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    protected $sendPush = false;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $linkText;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return News
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return News
     */
    public function setBody(string $body)
    {
        $this->body = $body;
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
     * @return News
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
     * @return News
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return News
     */
    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     * @return News
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return News
     */
    public function setLink(string $link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getPushText(): string
    {
        return $this->pushText;
    }

    /**
     * @param string $pushText
     * @return News
     */
    public function setPushText(string $pushText)
    {
        $this->pushText = $pushText;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSendPush()
    {
        return $this->sendPush;
    }

    /**
     * @param mixed $sendPush
     * @return News
     */
    public function setSendPush($sendPush)
    {
        $this->sendPush = $sendPush;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkText(): string
    {
        return $this->linkText;
    }

    /**
     * @param string $linkText
     * @return News
     */
    public function setLinkText(string $linkText)
    {
        $this->linkText = $linkText;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
