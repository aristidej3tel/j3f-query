<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Preset;

use J3tel\CoreBundle\Tools\QueryFilter\Preset\AbstractQueryFilterPreSet;
use Doctrine\ORM\QueryBuilder;
use J3tel\CoreBundle\Tools\QueryFilter\Condition;
use J3tel\CoreBundle\Tools\QueryFilter\Operator;

class GreaterThan extends AbstractQueryFilterPreSet
{   
    protected function operate(QueryBuilder &$queryBuilder)
    {
        $filter = new Condition\AndX(
            new Operator\GreaterThan($this->field, $this->value)
        );
        $filter->apply($queryBuilder);
    }
}
