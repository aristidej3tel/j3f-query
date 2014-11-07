<?php
namespace J3tel\QueryBundle\QueryFilter\Commun;

use Doctrine\ORM\QueryBuilder;

interface QueryFilterInterface
{   
    const ORDER_ASC = 'ASC';
    const ORDER_DESC = 'DESC';
    
    public function getField();
    public function getValue();
    public function apply(QueryBuilder &$queryBuilder);
}
