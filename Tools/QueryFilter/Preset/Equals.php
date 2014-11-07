<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Preset;

use J3tel\CoreBundle\Tools\QueryFilter\Preset\AbstractQueryFilterPreSet;
use J3tel\CoreBundle\Tools\QueryFilter\Condition;
use J3tel\CoreBundle\Tools\QueryFilter\Operator;

class Equals extends AbstractQueryFilterPreSet
{
    protected $isFieldName;
    
    public function __construct($field, $value, $isFieldName = false)
    {
        parent::__construct($field, $value);
        $this->isFieldName = $isFieldName;
    }

    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder) {
        $filter = new Condition\AndX(
            new Operator\Equals($this->field, $this->value, $this->isFieldName)
        );
        $filter->apply($queryBuilder);
    }
}
