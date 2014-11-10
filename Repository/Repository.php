<?php
namespace J3tel\QueryBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class Repository extends EntityRepository
{
    public $queryFilters;
    // hydratation mode
    protected $mode;
    
    public function __construct($em, ClassMetadata $class, $queryFilters = array())
    {
        parent::__construct($em, $class);
        $this->queryFilters = $queryFilters;
        $this->mode = null;
    }

    public function createQueryBuilderQf($alias)
    {
        $query = $this->createQueryBuilder($alias);
        foreach ($this->queryFilters as $filter) {
            $filter->apply($query);
        }
        
        return $query;
    }

    public function count()
    {
        $query = $this->createQueryBuilderQf('r');
        
        $query->select($query->expr()->count('r.id'));

        return $query->getQuery()->getSingleScalarResult();
    }
    
    public function findOneQf()
    {
        $query = $this->createQueryBuilderQf('r');
        
        return $query
            ->getQuery()
            ->getSingleResult($this->mode);
    }

    public function findQf($limit = null, $offset = null)
    {
        $query = $this->createQueryBuilderQf('r');
        if ($limit !== null) {
            $query->setMaxResults($limit);
        }
        if ($offset !== null) {
            $query->setFirstResult($offset);
        }
        
        return $query
            ->getQuery()
            ->getResult($this->mode);
    }
    
    public function getQueryFilters()
    {
        return $this->queryFilters;
    }

    public function setQueryFilters(array $queryFilters)
    {
        $this->queryFilters = $queryFilters;
        
        return $this;
    }
    
    public function getMode()
    {
        return $this->mode;
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
        
        return $this;
    }
}
