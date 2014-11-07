<?php
namespace J3tel\QueryBundle\Tools\Lock\Manager;

interface ManagerInterface
{
    public function __construct($manager);
    public function persist(\J3tel\CoreBundle\Tools\Lock\LockInterface $lock);
    public function hasLock(\J3tel\CoreBundle\Tools\Lock\LockInterface $lock);
}
