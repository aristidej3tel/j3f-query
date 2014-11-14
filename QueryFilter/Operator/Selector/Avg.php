<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Selector;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
use J3tel\QueryBundle\QueryFilter\Operator\Select\AliasableInterface;

class Avg extends AbstractOperator implements AliasableInterface
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->avg($this->prefix . '.' . $this->getField());
    }
}
