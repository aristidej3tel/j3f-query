<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Selector;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
use J3tel\QueryBundle\QueryFilter\Operator\Selector\AliasableInterface;

class Field extends AbstractOperator implements AliasableInterface
{
    public function __construct($field)
    {
        $this->hasBindParameter = false;
        parent::__construct($field, null);
    }

    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $this->prefix . '.' . $this->getField();
    }
}
