<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Arithmetic;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

/**
 * Multiplication
 */
class Prod  extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->prod($this->prefix . '.' . $this->field, $this->bindFieldName);
    }
}
