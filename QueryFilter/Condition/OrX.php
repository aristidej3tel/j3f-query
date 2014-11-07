<?php
namespace J3tel\QueryBundle\QueryFilter\Condition;

use J3tel\QueryBundle\Exceptions\OperatorException;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;
use J3tel\QueryBundle\QueryFilter\Condition\AbstractQCondition;

class OrX extends AbstractQCondition
{
    protected $operators;
    
    public function __construct()
    {
        $this->operators = func_get_args();
    }

    public function setOperators(array $operators)
    {
        $this->operators = $operators;
    }
    
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $orX = $queryBuilder->expr()->orX();
        foreach ($this->operators as $filter) {
            //check id is "OperatorInterface" => throw OperatorException
            if (($filter instanceof OperatorInterface) === false) {
                throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($filter), __CLASS__));
            }
            $orX->add($filter->apply($queryBuilder));
            $this->setParameterValue($queryBuilder, $filter);
        }
        
        $queryBuilder->andWhere($orX);
    }
}
