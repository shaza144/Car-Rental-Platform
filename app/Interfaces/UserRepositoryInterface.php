<?php
namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function all(): array;
    public function delete(int $id): void;
    public function assignRoles(int $id, array $roles): void;
}
