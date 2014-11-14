<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Comparison;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
        
class In extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->in($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
