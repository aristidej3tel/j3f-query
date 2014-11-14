<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Arithmetic;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

/**
 * Soustraction
 */
class Diff extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->diff($this->prefix . '.' . $this->field, $this->bindFieldName);
    }
}
