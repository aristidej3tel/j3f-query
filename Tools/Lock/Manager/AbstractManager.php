<?php
namespace J3tel\QueryBundle\Tools\Lock\Manager;

use J3tel\CoreBundle\Tools\Lock\Manager\ManagerInterface;
use J3tel\CoreBundle\Tools\Lock\LockInterface;

abstract class AbstractManager implements ManagerInterface
{
    protected $manager;

    public function __construct($manager)
    {
        $this->manager = $manager;
    }
    
    public function persist(LockInterface $lock)
    {
        throw new Exception(sprintf('Function %s must be defined in %s', __FUNCTION__, __CLASS__));
    }

    public function hasLock(LockInterface $lock)
    {
        throw new Exception(sprintf('Function %s must be defined in %s', __FUNCTION__, __CLASS__));
    }
}
