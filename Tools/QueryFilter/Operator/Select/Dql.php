<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator\Select;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\Select\AliasableInterface;

class Dql extends AbstractOperator implements AliasableInterface
{
    public function __construct($field)
    {
        $this->hasBindParameter = false;
        $this->value = $value;
        $this->field = $field;
    }

    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        return $this->getField();
    }
}
