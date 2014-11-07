<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator\Select;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\Select\AliasableInterface;

class Min extends AbstractOperator implements AliasableInterface
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->min($this->prefix . '.' . $this->getField());
    }
}
