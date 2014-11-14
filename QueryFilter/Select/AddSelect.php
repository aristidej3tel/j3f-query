<?php
namespace J3tel\QueryBundle\QueryFilter\Select;

use J3tel\QueryBundle\QueryFilter\Condition\AbstractQCondition;
use Doctrine\ORM\QueryBuilder;
use J3tel\QueryBundle\Exceptions\OperatorException;
use J3tel\QueryBundle\QueryFilter\Operator\OperatorInterface;

class AddSelect extends AbstractQCondition
{
    protected $selectors;
    
    public function __construct()
    {
        $this->selectors = func_get_args();
    }
    
    protected function operate(QueryBuilder &$queryBuilder)
    {        
        foreach ($this->selectors as $filter) {
            if (($filter instanceof OperatorInterface) === false) {
                throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($filter), __CLASS__));
            }
            $queryBuilder->addSelect($filter->apply($queryBuilder));
            $this->setParameterValue($queryBuilder, $filter);
        }
    }
}
