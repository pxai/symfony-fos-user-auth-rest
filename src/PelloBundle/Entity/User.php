<?php
namespace PelloBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends OAuthUser implements  UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $nickname;
    protected $username;
    protected $password;
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $realName;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email2;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email3;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $avatar;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $fid;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $gid;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $social;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lid;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tid;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_on;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $last_login;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_on;

    protected $roles;
    protected $salt;


    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->password = "";
        $this->roles = new ArrayCollection();
        $this->roles->add('ROLE_USER');
        //using Doctrine DateTime here
        $this->created_on = new \DateTime('now');
        $this->updated_on = new \DateTime('now');
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        //using Doctrine DateTime here
        $this->updated_on = new \DateTime('now');
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        $this->username = $nickname;
        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->nickname;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }
    /**
     * Set realName
     *
     * @param string $realName
     * @return User
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
        return $this;
    }
    /**
     * Get realName
     *
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }
    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set email2
     *
     * @param string $email2
     * @return User
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;
        return $this;
    }
    /**
     * Get email2
     *
     * @return string
     */
    public function getEmail2()
    {
        return $this->email2;
    }
    /**
     * Set email3
     *
     * @param string $email3
     * @return User
     */
    public function setEmail3($email3)
    {
        $this->email3 = $email3;
        return $this;
    }
    /**
     * Get email3
     *
     * @return string
     */
    public function getEmail3()
    {
        return $this->email3;
    }
    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }
    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
    /**
     * Set fid
     *
     * @param string $fid
     * @return User
     */
    public function setFid($fid)
    {
        $this->fid = $fid;
        return $this;
    }
    /**
     * Get fid
     *
     * @return string
     */
    public function getFid()
    {
        return $this->fid;
    }
    /**
     * Set gid
     *
     * @param string $gid
     * @return User
     */
    public function setGid($gid)
    {
        $this->gid = $gid;
        return $this;
    }
    /**
     * Get gid
     *
     * @return string
     */
    public function getGid()
    {
        return $this->gid;
    }
    /**
     * Set social
     *
     * @param string $social
     * @return User
     */
    public function setSocial($social)
    {
        $this->social = $social;
        return $this;
    }
    /**
     * Get social
     *
     * @return string
     */
    public function getSocial()
    {
        return $this->social;
    }
    /**
     * Set lid
     *
     * @param string $lid
     * @return User
     */
    public function setLid($lid)
    {
        $this->lid = $lid;
        return $this;
    }
    /**
     * Get lid
     *
     * @return string
     */
    public function getLid()
    {
        return $this->lid;
    }
    /**
     * Set created_on
     *
     * @param \DateTime $createdOn
     * @return User
     */
    public function setCreatedOn($createdOn)
    {
        $this->created_on = $createdOn;
        return $this;
    }
    /**
     * Get created_on
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }
    /**
     * Set last_login
     *
     * @param \DateTime $lastLogin
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->last_login = $lastLogin;
        return $this;
    }
    /**
     * Get last_login
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }
    /**
     * Set updated_on
     *
     * @param \DateTime $updatedOn
     * @return User
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updated_on = $updatedOn;
        return $this;
    }
    /**
     * Get updated_on
     *
     * @return \DateTime
     */
    public function getUpdatedOn()
    {
        return $this->updated_on;
    }
    /**
     * Set tid
     *
     * @param string $tid
     * @return User
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * Get tid
     *
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }




    public function getRolesAsCollection()
    {
        return $this->roles;
    }

    public function setRoles($role)
    {
        return $this->roles->add($role);
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function eraseCredentials()
    {
    }


    public function isEqualTo(UserInterface $user)
    {
        if ((int)$this->getId() === $user->getId()) {
            return true;
        }

        return false;
    }
}