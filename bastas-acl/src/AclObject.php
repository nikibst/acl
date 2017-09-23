<?php

namespace Bsstas\Acl;


final class AclObject
{
    private $objectName = '';
    private $roleCollectionManager = null;

    public function __construct(string $objectName)
    {
        $this->objectName = $objectName;
        $this->roleCollectionManager = new RoleCollectionManager();
    }

    public function assignRole(string $roleName)
    {
        $this->roleCollectionManager->add($roleName);
    }

    public function getName(): string
    {
        return $this->objectName;
    }

    public function getAllowedRoles(): array
    {
        return $this->roleCollectionManager->getCollection();
    }
}
