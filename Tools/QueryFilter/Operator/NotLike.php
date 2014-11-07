<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\OperatorInterface;

class NotLike extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->notLike($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
