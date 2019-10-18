<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
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
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string")
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $bdate;

    /**
     * @ORM\Column(type="integer")
     */
    private $cityId;

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
    private $vkId;

    /**
     * @ORM\Column(type="string")
     */
    private $vkToken;

    /**
     * @ORM\Column(type="string")
     */
    private $avatarFileName;

    /**
     * @ORM\Column(type="string")
     */
    private $avatarContentType;

    /**
     * @ORM\Column(type="integer")
     */
    private $avatarFileSize;


    /**
     * @ORM\Column(type="datetime")
     */
    private $avatarUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $avatarMeta;

    /**
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @ORM\Column(type="string")
     */
    private $vkPhone;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
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
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
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
     */
    public function setBdate($bdate): void
    {
        $this->bdate = $bdate;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * @param mixed $cityId
     */
    public function setCityId($cityId): void
    {
        $this->cityId = $cityId;
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
    public function setCreatedAt($created_at): void
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
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
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
     */
    public function setVkId($vkId): void
    {
        $this->vkId = $vkId;
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
     */
    public function setVkToken($vkToken): void
    {
        $this->vkToken = $vkToken;
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
     */
    public function setAvatarFileName($avatarFileName): void
    {
        $this->avatarFileName = $avatarFileName;
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
     */
    public function setAvatarContentType($avatarContentType): void
    {
        $this->avatarContentType = $avatarContentType;
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
     */
    public function setAvatarFileSize($avatarFileSize): void
    {
        $this->avatarFileSize = $avatarFileSize;
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

    public function __construct()
    {
        $this->devices = new ArrayCollection();
        $this->notifications = new ArrayCollection();
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
}
