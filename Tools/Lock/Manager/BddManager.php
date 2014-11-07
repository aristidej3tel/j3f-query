<?php
namespace J3tel\QueryBundle\Tools\Lock\Manager;

use J3tel\CoreBundle\Tools\Lock\Manager\AbstractManager;

class BddManager extends AbstractManager
{
    public function persist(\J3tel\CoreBundle\Tools\Lock\LockInterface $lock)
    {
        $this->manager->persist($lock);
        $this->manager->flush();
    }
    public function hasLock(\J3tel\CoreBundle\Tools\Lock\LockInterface $lock)
    {
        return $this->manager->getRepository(get_class($lock))->hasLock($lock);
    }
}
