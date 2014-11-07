<?php
namespace J3tel\QueryBundle\Tools\Lock;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="J3tel\CoreBundle\Tools\Lock\LockRepository")
 * @ORM\Table(name="j3f_lock")
 * @UniqueEntity(fields={"ukey", "expireAt"}, message="duplicate lock")
 */
class Lock implements LockInterface
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
     * @ORM\Column(type="string")
    */
    protected $ukey;
    /**
     * Timestamp
     * @ORM\Column(type="integer")
     */
    protected $expireAt;
    /**
     * Timestamp
     * @ORM\Column(type="integer")
     */
    protected $creationDate;
    /**
     * @ORM\Column(type="boolean")
     */
    protected $active;

    public function __construct()
    {
        $date = new \DateTime();
        $this->creationDate = $date->getTimestamp();
        $this->active = true;
    }

    public function getTimeRemaining()
    {
        return 11;
    }
    public function isValid()
    {
        return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getKey()
    {
        return $this->ukey;
    }

    public function setKey($key)
    {
        $this->ukey = $key;

        return $this;
    }
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }
    
    public function enable()
    {
        $this->active = true;
        
        return $this;
    }

    public function disable()
    {
        $this->active = false;

        return $this;
    }
}
