<?php
namespace J3tel\QueryBundle\QueryFilter\Operator;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

class Like extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->like($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
