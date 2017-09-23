<?php

namespace Bsstas\Acl;


final class AclObjectCollectionManager extends AbstractCollectionManager
{
    public function add(string $aclObjectName)
    {
        $this->collection[$aclObjectName] = new AclObject($aclObjectName);
    }
}