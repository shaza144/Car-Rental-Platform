<?php
// app/DTOs/RoleDTO.php

namespace App\DTOs\Roles;

class RoleDTO
{
    public function __construct(
        public string $name,
        public ?array $permissions = []
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->name,
            permissions: $request->permissions,
        );
    }
}

