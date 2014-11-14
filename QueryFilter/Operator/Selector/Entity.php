<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Selector;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;

class Entity extends AbstractOperator
{
    public function __construct($field)
    {
        $this->hasBindParameter = false;
        parent::__construct($field, null);
    }

    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
       return $this->getField();
    }
}
