<?php
namespace J3tel\QueryBundle\Tools\Lock;

use J3tel\CoreBundle\Tools\Repository\Repository;
use J3tel\CoreBundle\Tools\Lock\LockInterface;

class LockRepository extends Repository
{
    public function hasLock(LockInterface $lock)
    {
        try {
            $query  = $this->createQueryBuilder('l');
        
            $result = $query
                ->where($query->expr()->gt('l.expireAt', ':date'))
                ->andWhere($query->expr()->eq('l.ukey', ':key'))
                ->setParameter(':date', $lock->getCreationDate())
                ->setParameter(':key', $lock->getKey())
                ->getQuery()
                ->getSingleResult()
            ;
            
            return $result;
        } catch (\Exception $e) {
            
        }
        
        return false;
    }
}
