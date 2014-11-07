<?php
namespace J3tel\QueryBundle\QueryFilter\Operator;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
        
class LowerThan extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->lt($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}
