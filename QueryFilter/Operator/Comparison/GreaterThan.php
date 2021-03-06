<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Comparison;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
use Doctrine\ORM\QueryBuilder;

class GreaterThan extends AbstractOperator
{   
    protected function getExpr(QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->gt($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
