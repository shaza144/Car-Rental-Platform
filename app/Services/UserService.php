<?php
namespace App\Services;

use App\Interfaces\UserRepositoryInterface;

class UserService
{
    public function __construct(protected UserRepositoryInterface $userRepo) {}

    public function getAllUsers(): array
    {
        return $this->userRepo->all(); // ✅ استخدم this
    }

    public function deleteUser(int $id): void
    {
        $this->userRepo->delete($id); // ✅ استخدم this
    }
    public function assignRoles(int $userId, array $roles): void
{
    $this->userRepo->assignRoles($userId, $roles);
}

}

