<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Arithmetic;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

/**
 * Division
 */
class Quot extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->quot($this->prefix . '.' . $this->field, $this->bindFieldName);
    }
}
