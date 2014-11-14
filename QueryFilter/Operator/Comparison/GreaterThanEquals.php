<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Comparison;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
        
class GreaterThanEquals extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->gte($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
