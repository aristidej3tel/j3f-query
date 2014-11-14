<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Selector;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
use J3tel\QueryBundle\QueryFilter\Operator\Select\AliasableInterface;

class Min extends AbstractOperator implements AliasableInterface
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->min($this->prefix . '.' . $this->getField());
    }
}
