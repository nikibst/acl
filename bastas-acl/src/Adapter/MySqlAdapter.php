<?php

namespace Bsstas\Acl\Adapter;

use Bsstas\Acl\RoleAdapterInterface;

final class MySqlAdapter implements RoleAdapterInterface
{
    public function retrieveRoles()
    {
        return ['guest', 'user', 'moderator', 'admin'];
    }
}