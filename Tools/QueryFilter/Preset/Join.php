<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Preset;

use J3tel\CoreBundle\Tools\QueryFilter\Preset\AbstractQueryFilterPreSet;

class Join extends AbstractQueryFilterPreSet
{
    public function __construct($field, $value)
    {
        $this->value = $value;
        list($this->prefix, $this->field) = $this->parsePrefixFieldName($field);
        if ($this->field === null) {
            $this->field = $field;    
        }
    }
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $queryBuilder->join($this->prefix . '.' . $this->getField(), $this->getValue());
    }
}
