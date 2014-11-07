<?php
namespace J3tel\QueryBundle\QueryFilter;

use J3tel\CoreBundle\Exceptions\QueryFilter\OperatorException;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\OperatorInterface;
use Doctrine\ORM\QueryBuilder;
use J3tel\CoreBundle\Tools\QueryFilter\Condition\AbstractQCondition;

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
