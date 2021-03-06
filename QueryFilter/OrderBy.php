<?php
namespace J3tel\QueryBundle\QueryFilter;

use J3tel\QueryBundle\QueryFilter\Condition\AbstractQCondition;
use J3tel\QueryBundle\Exceptions\OperatorException;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;
use Doctrine\ORM\QueryBuilder;

class OrderBy extends AbstractQCondition
{
    protected $operator;
    protected $order;
    
    public function __construct($operator, $order = self::ORDER_ASC)
    {
        $this->operator = $operator;
        $this->order = $order;
    }
    
    protected function operate(QueryBuilder &$queryBuilder)
    {        
        if (($this->operator instanceof OperatorInterface) === false) {
            throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($this->operator), __CLASS__));
        }
        $queryBuilder->orderBy($this->operator->apply($queryBuilder), $this->order);
        $this->setParameterValue($queryBuilder, $this->operator);
    }
}

