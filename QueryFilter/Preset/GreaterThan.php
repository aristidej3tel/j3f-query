<?php
namespace J3tel\QueryBundle\QueryFilter\Preset;

use J3tel\QueryBundle\QueryFilter\Preset\AbstractQueryFilterPreSet;
use Doctrine\ORM\QueryBuilder;
use J3tel\QueryBundle\QueryFilter\Condition;
use J3tel\QueryBundle\QueryFilter\Operator;

class GreaterThan extends AbstractQueryFilterPreSet
{   
    protected function operate(QueryBuilder &$queryBuilder)
    {
        $filter = new Condition\AndX(
            new Operator\Comparison\GreaterThan($this->field, $this->value)
        );
        $filter->apply($queryBuilder);
    }
}
