<?php

namespace App\Entity;

use App\Entity\Document;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User implements UserInterface
{
    public const RANDOM_STRING = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", nullable=true)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="Device", mappedBy="userId")
     */
    private $devices;

    /**
     * @ORM\OneToMany(targetEntity="Notifications", mappedBy="userId")
     */
    private $notifications;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $bdate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $name;

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
    private $vkId;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $vkToken;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $avatarFileName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $avatarContentType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $avatarFileSize;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $avatarUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $avatarMeta;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $vkPhone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserTask", mappedBy="user")
     */
    private $userTasks;


    /**
     * @var $myDocument \App\Entity\Document
     *
     * @ORM\OneToOne( targetEntity="\App\Entity\Document", orphanRemoval=true, cascade={"persist", "remove"} )
     * @ORM\JoinColumn(name="document_file_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $myDocument;

    public function __construct()
    {
        $this->devices = new ArrayCollection();
        $this->notifications = new ArrayCollection();
        //$this->image = new ArrayCollection();
    }


    /**
     * @return \App\Entity\Document
     */
    public function getMyDocument(): ?Document
    {
        return $this->myDocument;
    }

    /**
     * @param mixed $myDocument
     * @return User
     */
    public function setMyDocument($myDocument)
    {
        $this->myDocument = $myDocument;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return \App\Entity\User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return \App\Entity\User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBdate()
    {
        return $this->bdate;
    }

    /**
     * @param mixed $bdate
     * @return \App\Entity\User
     */
    public function setBdate($bdate)
    {
        $this->bdate = $bdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return \App\Entity\User
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return \App\Entity\User
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
     * @return \App\Entity\User
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVkId()
    {
        return $this->vkId;
    }

    /**
     * @param mixed $vkId
     * @return \App\Entity\User
     */
    public function setVkId($vkId)
    {
        $this->vkId = $vkId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVkToken()
    {
        return $this->vkToken;
    }

    /**
     * @param mixed $vkToken
     * @return \App\Entity\User
     */
    public function setVkToken($vkToken)
    {
        $this->vkToken = $vkToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarFileName()
    {
        return $this->avatarFileName;
    }

    /**
     * @param mixed $avatarFileName
     * @return \App\Entity\User
     */
    public function setAvatarFileName($avatarFileName)
    {
        $this->avatarFileName = $avatarFileName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarContentType()
    {
        return $this->avatarContentType;
    }

    /**
     * @param mixed $avatarContentType
     * @return \App\Entity\User
     */
    public function setAvatarContentType($avatarContentType)
    {
        $this->avatarContentType = $avatarContentType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarFileSize()
    {
        return $this->avatarFileSize;
    }

    /**
     * @param mixed $avatarFileSize
     * @return \App\Entity\User
     */
    public function setAvatarFileSize($avatarFileSize)
    {
        $this->avatarFileSize = $avatarFileSize;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarUpdatedAt()
    {
        return $this->avatarUpdatedAt;
    }

    /**
     * @param mixed $avatarUpdatedAt
     * @return User
     */
    public function setAvatarUpdatedAt($avatarUpdatedAt)
    {
        $this->avatarUpdatedAt = $avatarUpdatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarMeta(): string
    {
        return $this->avatarMeta;
    }

    /**
     * @param string $avatarMeta
     * @return User
     */
    public function setAvatarMeta(string $avatarMeta)
    {
        $this->avatarMeta = $avatarMeta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVkPhone()
    {
        return $this->vkPhone;
    }

    /**
     * @param mixed $vkPhone
     * @return User
     */
    public function setVkPhone($vkPhone)
    {
        $this->vkPhone = $vkPhone;
        return $this;
    }

    public function getNotifications()
    {
        return $this->notifications;
    }


    public function getDevices()
    {
        return $this->devices;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): ?string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->email;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cities", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cities;

    public function getCities(): ?Cities
    {
        return $this->cities;
    }

    public function setCities(Cities $cities)
    {
        $this->cities = $cities;
    }

    /**
     * @return string
     */
    public function generatePassword()
    {
        $stringLength = strlen(self::RANDOM_STRING);
        $code = '';

        for ($i = 0; $i < $stringLength; $i++) {
            $code .= self::RANDOM_STRING[rand(0, $stringLength - 1)];
        }

        return $code;
    }
}
