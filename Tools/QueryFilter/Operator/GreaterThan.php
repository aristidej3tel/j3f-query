<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
use Doctrine\ORM\QueryBuilder;

class GreaterThan extends AbstractOperator
{   
    protected function getExpr(QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->gt($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
