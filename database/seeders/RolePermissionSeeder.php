<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // 🔐 قائمة الصلاحيات
         $permissions = [
            'manage users',
            'manage roles',
            'manage cars',
            'manage bookings',
            'view analytics',
            'create cars',
            'edit cars',
            'delete cars',
            'approve bookings',
            'rate cars',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 🎭 إنشاء الأدوار وربط الصلاحيات
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $staff = Role::firstOrCreate(['name' => 'staff']);
        $user  = Role::firstOrCreate(['name' => 'user']);

        $admin->syncPermissions($permissions); // كل شيء

        $staff->syncPermissions([
            'manage bookings',
            'create cars',
            'edit cars',
            'approve bookings',
        ]);

        $user->syncPermissions([
            'rate cars',
        ]);

    }
}
