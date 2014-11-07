<?php
namespace J3tel\QueryBundle\QueryFilter\Preset;

use J3tel\QueryBundle\QueryFilter\Commun\AbstractQueryFilter;
use J3tel\QueryBundle\QueryFilter\Commun\QueryFilterInterface;

abstract class AbstractQueryFilterPreSet extends AbstractQueryFilter implements QueryFilterInterface
{
    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
    
    public function apply(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $this->initialize($queryBuilder);
        $this->operate($queryBuilder);
    }
    
    abstract protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder);
}
