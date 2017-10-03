<?php

namespace Bastas\Acl;


final class AclManager
{
    private $roleAdapter = null;
    private $roleCollectionManager = null;
    private $aclObjectCollectionManager = null;

    public function __construct(RoleAdapterInterface $roleAdapter)
    {
        $this->roleAdapter = $roleAdapter;
        $this->roleCollectionInitialize();
        $this->aclObjectCollectionInitialize();
        $this->fillRoleCollection();
    }

    private function aclObjectCollectionInitialize()
    {
        $this->aclObjectCollectionManager = new AclObjectCollectionManager();
    }

    private function roleCollectionInitialize()
    {
        $this->roleCollectionManager = new RoleCollectionManager();
    }

    private function fillRoleCollection()
    {
        $roles = $this->roleAdapter->retrieveRoles();

        foreach ($roles as $role) {
            $this->roleCollectionManager->add($role);
        }
    }

    public function addAclObject($aclObjectName)
    {
        $this->aclObjectCollectionManager->add($aclObjectName);
    }

    public function getAclObjectCollection(): array
    {
        return $this->aclObjectCollectionManager->getCollection();
    }

    public function assignRoleToObject(string $objectName, string $roleName)
    {
        $aclObjectCollection = $this->aclObjectCollectionManager->getCollection();
        $aclObject = $aclObjectCollection[$objectName];
        $aclObject->assignRole($roleName);
    }

    public function isAllowed(string $objectName, string $roleName): bool
    {
        $aclObjectCollection = $this->aclObjectCollectionManager->getCollection();
        $allowedRoles = $aclObjectCollection[$objectName]->getAllowedRoles();

        return in_array($roleName, array_keys($allowedRoles));
    }
}