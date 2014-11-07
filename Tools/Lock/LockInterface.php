<?php
namespace J3tel\QueryBundle\Tools\Lock;

interface LockInterface
{
    public function getKey();
    public function getExpireAt();
    public function getCreationDate();
    public function enable();
    public function disable();
}
