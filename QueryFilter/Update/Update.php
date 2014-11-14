<?php
namespace J3tel\QueryBundle\QueryFilter\Update;

use Doctrine\ORM\QueryBuilder;
use J3tel\QueryBundle\QueryFilter\Preset\AbstractQueryFilterPreSet;

class Update extends AbstractQueryFilterPreSet
{       
    protected function operate(QueryBuilder &$queryBuilder)
    {        
        $queryBuilder->update($this->field, $this->value);
    }
}
