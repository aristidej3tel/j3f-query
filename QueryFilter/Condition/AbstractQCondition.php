<?php
namespace J3tel\QueryBundle\QueryFilter\Condition;

use J3tel\CoreBundle\Tools\QueryFilter\Condition\QConditionInterface;
use J3tel\CoreBundle\Tools\QueryFilter\Commun\AbstractQueryFilter;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractQCondition extends AbstractQueryFilter implements QConditionInterface
{
    public function apply(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $this->initialize($queryBuilder);
        $this->operate($queryBuilder);
    }
    abstract protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder);
    
    protected function setParameterValue(QueryBuilder &$queryBuilder, $filter)
    {
        if ($filter->hasBindParameter() === true) {
            $queryBuilder->setParameter($filter->getBindParameterName(), $filter->getValue());    
        }
    }
}
