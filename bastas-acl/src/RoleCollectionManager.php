<?php

namespace Bsstas\Acl;


final class RoleCollectionManager extends AbstractCollectionManager
{
    public function add(string $name)
    {
        $this->collection[$name] = new Role($name);
    }
}