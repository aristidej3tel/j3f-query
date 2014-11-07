<?php
namespace J3tel\QueryBundle\QueryFilter;

use J3tel\QueryBundle\QueryFilter\Condition\AbstractQCondition;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;
use J3tel\QueryBundle\Exceptions\OperatorException;
use Doctrine\ORM\QueryBuilder;

class GroupBy extends AbstractQCondition
{
    protected $operators;
    
    public function __construct()
    {
        $this->operators = func_get_args();
    }
    
    protected function operate(QueryBuilder &$queryBuilder)
    {        
        $cpt = 0;
        foreach ($this->operators as $filter) {
            if (($filter instanceof OperatorInterface) === false) {
                throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($filter), __CLASS__));
            }
            if ($cpt === 0) {
                $queryBuilder->groupBy($filter->apply($queryBuilder));
            } else {
                $queryBuilder->addOrderBy($filter->apply($queryBuilder));
            }
            $this->setParameterValue($queryBuilder, $filter);
            $cpt++;
        }
    }
}