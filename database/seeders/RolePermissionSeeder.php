<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'manager',
            'editor',
            'customer',
        ];
        $permissions = [
            'manage packages', 'view packages', 'create package', 'edit package', 'delete package',
            'manage bookings', 'view bookings', 'create booking', 'edit booking', 'cancel booking',
            'manage blogs', 'view blogs', 'create blog', 'edit blog', 'delete blog',
            'manage users', 'view users', 'edit user', 'delete user',
            'view dashboard', 'access admin panel',
        ];

        // Create permissions with UUIDs
        $permissionModels = [];
        foreach ($permissions as $permission) {
            $permissionModels[] = Permission::create([
                'id' => Str::uuid(),
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }

        // Create roles with UUIDs
        foreach ($roles as $roleName) {
            Role::create([
                'id' => Str::uuid(),
                'name' => $roleName,
                'guard_name' => 'admin',
            ]);
        }

        // Debug output: print all permission and role IDs
        dump('Permissions:', Permission::all()->pluck('id', 'name')->toArray());
        dump('Roles:', Role::all()->pluck('id', 'name')->toArray());
    }
} 