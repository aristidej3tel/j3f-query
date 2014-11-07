<?php
namespace J3tel\QueryBundle\QueryFilter\Condition;

class AndHaving
{
    protected $operator;
    
    public function __construct($operator)
    {
        $this->operator = $operator;
    }
    
    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        //check id is "OperatorInterface" => throw OperatorException
        if (($this->operator instanceof OperatorInterface) === false) {
            throw new OperatorException(sprintf('Bad sub Operator "%s" given to Operator %s', get_class($this->operator), __CLASS__));
        }
        $queryBuilder->andHaving($this->operator->apply($queryBuilder));
        $this->setParameterValue($queryBuilder, $this->operator);
    }
}
