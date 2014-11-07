<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Commun;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractQueryFilter
{
    protected $field;
    protected $value;
    protected $prefix;
    protected $hasBindParameter;
    protected $bindFieldName;
    
    abstract function apply(QueryBuilder &$queryBuilder);

    protected function initialize(QueryBuilder $queryBuilder)
    {
        if ($this->hasBindParameter === true) {
            $fieldName = ':value' . uniqid('', true);
            $this->bindFieldName = str_replace('.', rand(), $fieldName);
        }
        //cherche automatiquement le prefix
        if ($this->prefix === null) {
            $alias = $queryBuilder->getRootAliases();
            $this->prefix = $alias[0];
        }
        
        return $this;
    }
   
    protected function parsePrefixFieldName($fieldName)
    {
        $values = explode('.', $fieldName);
        if (count($values) > 1) {
            return array(
                $values[0],
                $values[1]
            );
        }
        return array(
            null,
            null
        );
    }

    public function getField()
    {
        return $this->field;
    }

    public function getValue()
    {
        return $this->value;
    }
    
    public function setField($field)
    {
        $this->field = $field;
        
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        
        return $this;
    }
    
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        
        return $this;
    }
}
