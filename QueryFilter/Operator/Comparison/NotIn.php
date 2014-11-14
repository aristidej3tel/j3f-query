<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Comparison;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

class NotIn extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->notIn($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
