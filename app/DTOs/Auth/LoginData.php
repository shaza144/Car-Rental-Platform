<?php
namespace App\DTOs\Auth;

class LoginData
{
    public function __construct(
        public string $email,
        public string $password
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            email: $request->email,
            password: $request->password
        );
    }
}

