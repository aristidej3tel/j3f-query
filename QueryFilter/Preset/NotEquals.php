<?php
namespace J3tel\QueryBundle\QueryFilter\Preset;

use J3tel\QueryBundle\QueryFilter\Preset\AbstractQueryFilterPreSet;
use J3tel\QueryBundle\QueryFilter\Condition;
use J3tel\QueryBundle\QueryFilter\Operator;

class NotEquals extends AbstractQueryFilterPreSet
{
    protected $isFieldName;
    
    public function __construct($field, $value, $isFieldName = false)
    {
        parent::__construct($field, $value);
        $this->isFieldName = $isFieldName;
    }
    
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $filter = new Condition\AndX(
            new Operator\Comparison\NotEquals($this->field, $this->value, $this->isFieldName)
        );
        $filter->apply($queryBuilder);
    }
}
