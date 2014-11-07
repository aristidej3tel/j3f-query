<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Preset;

use J3tel\CoreBundle\Tools\QueryFilter\Commun\AbstractQueryFilter;
use J3tel\CoreBundle\Tools\QueryFilter\Commun\QueryFilterInterface;

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
