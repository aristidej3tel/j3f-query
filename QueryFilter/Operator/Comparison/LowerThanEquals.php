<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Comparison;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

class LowerThanEquals extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->lte($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
