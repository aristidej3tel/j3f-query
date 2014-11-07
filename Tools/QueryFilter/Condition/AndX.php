<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Condition;

use J3tel\CoreBundle\Exceptions\QueryFilter\OperatorException;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\OperatorInterface;
use J3tel\CoreBundle\Tools\QueryFilter\Condition\AbstractQCondition;

class AndX extends AbstractQCondition
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
        $orX = $queryBuilder->expr()->andX();
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