<?php
namespace J3tel\QueryBundle\QueryFilter\Join;

use J3tel\QueryBundle\QueryFilter\Join\AbstractJoin;

class Join extends AbstractJoin
{
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $queryBuilder->join($this->prefix . '.' . $this->getField(), $this->getValue(), $this->conditionType, $this->condition, $this->indexBy);
    }
}
