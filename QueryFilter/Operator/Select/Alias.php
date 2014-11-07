<?php
namespace J3tel\QueryBundle\QueryFilter\Operator\Select;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\OperatorInterface;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\Select\AliasableInterface;

class Alias extends AbstractOperator
{
    protected $operator;
    protected $alias;
    
    public function __construct(OperatorInterface $operator, $alias)
    {
        $this->hasBindParameter = false;
        $this->operator = $operator;
        $this->alias = $alias;
    }

    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        if ($this->operator instanceof AliasableInterface === true) {
            return $this->operator->apply($queryBuilder) . ' AS ' . $this->alias;
        }
        return $this->operator->apply($queryBuilder);
    }
}
