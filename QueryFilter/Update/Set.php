<?php
namespace J3tel\QueryBundle\QueryFilter\Update;

use J3tel\QueryBundle\QueryFilter\Condition\AbstractQCondition;
use Doctrine\ORM\QueryBuilder;
use J3tel\QueryBundle\Exceptions\OperatorException;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;

class Set extends AbstractQCondition
{
    protected $operator;
    
    public function __construct($field, OperatorInterface $operator)
    {
        $this->field = $field;
        $this->operator = $operator;
    }
    
    protected function operate(QueryBuilder &$queryBuilder)
    {        
        $queryBuilder->set($this->field, $this->operator->apply($queryBuilder));
    }
}
