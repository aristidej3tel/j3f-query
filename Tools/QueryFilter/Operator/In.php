<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
        
class In extends AbstractOperator
{
    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $queryBuilder->expr()->in($this->prefix . '.' . $this->getField(), $this->bindFieldName);
    }
}