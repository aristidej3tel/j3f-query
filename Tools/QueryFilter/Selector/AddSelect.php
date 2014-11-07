<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Selector;

use J3tel\CoreBundle\Tools\QueryFilter\Condition\AbstractQCondition;
use Doctrine\ORM\QueryBuilder;
use J3tel\CoreBundle\Exceptions\QueryFilter\OperatorException;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\OperatorInterface;

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
