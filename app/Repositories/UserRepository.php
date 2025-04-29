<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\DTOs\UserDTO;
use Spatie\Permission\Models\Role;


class UserRepository implements UserRepositoryInterface
{
    public function all(): array
    {
        return User::with('roles')->get()->map(function ($user) {
            return new UserDTO(
                id: $user->id,
                name: $user->name,
                email: $user->email,
                roles: $user->getRoleNames()->toArray()
            );
        })->toArray();
    }

    public function delete(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }


public function assignRoles(int $id, array $roles): void
{
    $user = User::findOrFail($id);
    $user->syncRoles($roles);
}

}
