<?php
namespace J3tel\QueryBundle\QueryFilter\Operator;
   
use Doctrine\ORM\QueryBuilder;
/**
 * Permet d'identifier les Filtre qui peuvent devenir de sous filtre 
 * exemple "OrX" ne peut avoir uniquement que des filtres "SubFilterable"
 */
interface OperatorInterface
{   
    public function getField();
    public function getValue();
    public function apply(QueryBuilder &$queryBuilder);
    public function hasBindParameter();
    public function getBindParameterName();
}
