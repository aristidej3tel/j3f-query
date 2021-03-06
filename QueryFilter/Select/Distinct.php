<?php
namespace J3tel\QueryBundle\QueryFilter\Select;

use J3tel\QueryBundle\QueryFilter\Preset\AbstractQueryFilterPreSet;

class Distinct extends AbstractQueryFilterPreSet
{
    public function __construct()
    {
    }

    protected function operate(\Doctrine\ORM\QueryBuilder &$queryBuilder)
    {
        $queryBuilder->distinct();
    }
}
