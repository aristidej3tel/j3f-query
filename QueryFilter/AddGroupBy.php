<?php
namespace J3tel\QueryBundle\QueryFilter;

use J3tel\QueryBundle\Exceptions\OperatorException;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;
use J3tel\QueryBundle\QueryFilter\Condition\AbstractQCondition;
use Doctrine\ORM\QueryBuilder;

class AddGroupBy extends AbstractQCondition
{
    protected $operator;
    
    public function __construct($operator)
    {
        $this->operator = $operator;
    }
    
    protected function operate(QueryBuilder &$queryBuilder)
    {        
        if (($this->operator instanceof OperatorInterface) === false) {
            throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($this->operator), __CLASS__));
        }
        $queryBuilder->addGroupBy($this->operator->apply($queryBuilder));
        $this->setParameterValue($queryBuilder, $this->operator);
    }
}
