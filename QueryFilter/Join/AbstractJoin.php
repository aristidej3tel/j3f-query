<?php
namespace J3tel\QueryBundle\QueryFilter\Join;

use J3tel\QueryBundle\QueryFilter\Preset\AbstractQueryFilterPreSet;

abstract class AbstractJoin  extends AbstractQueryFilterPreSet
{
    protected $conditionType;
    protected $condition;
    protected $indexBy;
    
    public function __construct($field, $alias, $conditionType = null, $condition = null, $indexBy = null)
    {
        $this->condition = $condition;
        $this->conditionType = $conditionType;
        $this->indexBy = $indexBy;
        
        $this->value = $alias;
        list($this->prefix, $this->field) = $this->parsePrefixFieldName($field);
        if ($this->field === null) {
            $this->field = $field;    
        }
    }
}
