<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Preset;

use J3tel\CoreBundle\Tools\QueryFilter\Preset\AbstractQueryFilterPreSet;
use J3tel\CoreBundle\Tools\QueryFilter\Condition;
use J3tel\CoreBundle\Tools\QueryFilter\Operator;
        
class GreaterThanEquals extends AbstractQueryFilterPreSet
{
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $filter = new Condition\AndX(
            new Operator\GreaterThanEquals($this->field, $this->value)
        );
        $filter->apply($queryBuilder);
    }
}