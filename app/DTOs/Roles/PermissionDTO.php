<?php

// app/DTOs/PermissionDTO.php

namespace App\DTOs\Roles;

class PermissionDTO
{
    public function __construct(
        public string $name
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->name
        );
    }
}
