<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Selector;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
use J3tel\QueryBundle\QueryFilter\Operator\Selector\AliasableInterface;

class Max extends AbstractOperator implements AliasableInterface
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->max($this->prefix . '.' . $this->getField());
    }
}
