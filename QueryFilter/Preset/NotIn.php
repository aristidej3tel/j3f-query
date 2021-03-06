<?php
namespace J3tel\QueryBundle\QueryFilter\Preset;

use J3tel\QueryBundle\QueryFilter\Preset\AbstractQueryFilterPreSet;
use J3tel\QueryBundle\QueryFilter\Condition;
use J3tel\QueryBundle\QueryFilter\Operator;

class NotIn extends AbstractQueryFilterPreSet
{
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $filter = new Condition\AndX(
            new Operator\Comparison\NotIn($this->field, $this->value)
        );
        $filter->apply($queryBuilder);
    }
}
