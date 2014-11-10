<?php
namespace J3tel\QueryBundle\QueryFilter\Condition;

use J3tel\QueryBundle\Exceptions\OperatorException;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;

class Having
{
    protected $operator;
    
    public function __construct($operator)
    {
        $this->operator = $operator;
    }
    
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        //check id is "OperatorInterface" => throw OperatorException
        if (($this->operator instanceof OperatorInterface) === false) {
            throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($this->operator), __CLASS__));
        }
        $queryBuilder->having($this->operator->apply($queryBuilder));
        $this->setParameterValue($queryBuilder, $this->operator);
    }
}
