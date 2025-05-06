<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate all relevant tables
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        // Define roles and permissions
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

        // Create permissions with explicit UUIDs
        $permissionIds = [];
        foreach ($permissions as $permission) {
            $perm = Permission::create([
                'id' => (string) Str::uuid(),
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
            $permissionIds[] = $perm->id;
        }

        // Create roles with explicit UUIDs
        $roleIds = [];
        foreach ($roles as $role) {
            $roleModel = Role::create([
                'id' => (string) Str::uuid(),
                'name' => $role,
                'guard_name' => 'admin',
            ]);
            $roleIds[$role] = $roleModel->id;
        }

        // Assign all permissions to the admin role
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'admin')->first();
        if ($adminRole) {
            $adminRole->permissions()->sync($permissionIds);
        }

        // Assign admin role to the first user (if exists)
        $adminUser = User::first();
        if ($adminUser && !$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }
    }
} 