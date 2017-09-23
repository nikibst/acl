<?php

namespace Bsstas\Acl;


abstract class AbstractCollectionManager
{
    protected $collection = [];

    public function getCollection(): array
    {
        return $this->collection;
    }

    public function remove(string $name)
    {
        unset($this->collection[$name]);
    }
}