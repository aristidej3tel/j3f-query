<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Select;

use J3tel\QueryBundle\QueryFilter\Operator\AbstractOperator;
use J3tel\QueryBundle\QueryFilter\Operator\Select\AliasableInterface;

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
