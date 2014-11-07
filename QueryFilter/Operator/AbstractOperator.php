<?php
namespace J3tel\QueryBundle\QueryFilter\Operator;

use Doctrine\ORM\QueryBuilder;
use J3tel\CoreBundle\Tools\QueryFilter\Operator\OperatorInterface;
use J3tel\CoreBundle\Tools\QueryFilter\Commun\AbstractQueryFilter;

abstract class AbstractOperator extends AbstractQueryFilter implements OperatorInterface
{
    protected $hasBindParameter = true;
    
    public function __construct($field, $value = null)
    {
        $this->value = $value;
        list($this->prefix, $this->field) = $this->parsePrefixFieldName($field);
        if ($this->field === null) {
            $this->field = $field;    
        }
    }
    public function apply(QueryBuilder &$queryBuilder)
    {
        $this->initialize($queryBuilder);
        return $this->getExpr($queryBuilder);
    }

    public function hasBindParameter()
    {
        return $this->hasBindParameter;
    }
    
    public function getBindParameterName()
    {
        return $this->bindFieldName;
    }
}
