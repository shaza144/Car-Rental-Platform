<?php
namespace App\DTOs\Auth;

class RegisterData
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $phone,
        public string $password
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->name,
            email: $request->email,
            phone: $request->phone,
            password: $request->password
        );
    }
}

