<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Arithmetic;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

/**
 * Addition
 */
class Sum extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->sum($this->prefix . '.' . $this->field, $this->bindFieldName);
    }
}
