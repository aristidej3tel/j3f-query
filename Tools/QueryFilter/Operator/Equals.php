<?php
namespace J3tel\QueryBundle\Tools\QueryFilter\Operator;

use J3tel\CoreBundle\Tools\QueryFilter\Operator\AbstractOperator;

class Equals extends AbstractOperator
{
    protected $isFieldName;
    
    public function __construct($field, $value, $isFieldName = false)
    {
        parent::__construct($field, $value);
        $this->isFieldName = $isFieldName;
    }

    protected function getExpr(\Doctrine\ORM\QueryBuilder $queryBuilder) {
        if ($this->isFieldName === true) {
            // checkField Value
            list($secondPrefix, $fielName) = $this->parsePrefixFieldName($this->getValue());
            if ($secondPrefix !== null && $fielName !== null) {
                $this->hasBindParameter = false;
                return $queryBuilder->expr()->eq($this->prefix . '.' . $this->getField(), $secondPrefix . '.' . $fielName);
            } else {
                $this->hasBindParameter = false;
                return $queryBuilder->expr()->eq($this->prefix . '.' . $this->getField(), $this->prefix . '.' . $this->getValue());
            }
            
            return;
        }
        if ($this->getValue() === null) {
            $this->hasBindParameter = false;
            return $queryBuilder->expr()->isNull($this->prefix . '.' . $this->getField());
        } else {
            return  $queryBuilder->expr()->eq($this->prefix . '.' . $this->getField(), $this->bindFieldName);
        }
    }
}
