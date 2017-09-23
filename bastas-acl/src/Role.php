<?php

namespace Bsstas\Acl;


final class Role
{
    private $roleName = '';

    public function __construct(string $roleName)
    {
        $this->roleName = $roleName;
    }

    public function getName(): string
    {
        return $this->roleName;
    }
}