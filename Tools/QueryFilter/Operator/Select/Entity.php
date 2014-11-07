<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator\Select;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;

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
