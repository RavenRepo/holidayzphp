<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Clear permission cache
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Only truncate in local/testing environments
        if (app()->environment(['local', 'testing'])) {
            DB::table('role_has_permissions')->truncate();
            DB::table('model_has_roles')->truncate();
            DB::table('model_has_permissions')->truncate();
            Role::truncate();
            Permission::truncate();
        }

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

        // Create permissions with UUIDs if they don't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'admin'],
                ['id' => Str::uuid()]
            );
        }

        // Create roles with UUIDs if they don't exist
        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role, 'guard_name' => 'admin'],
                ['id' => Str::uuid()]
            );
        }

        // Assign all permissions to admin role
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'admin')->first();

        if ($adminRole) {
            $adminPermissionNames = Permission::where('guard_name', 'admin')->pluck('name')->toArray();
            $adminRole->syncPermissions($adminPermissionNames); // Assign by name (Spatie will resolve)
        }

        // Assign admin role to the first user (ensure guard matches)
        $adminUser = User::first();
        if ($adminUser && !$adminUser->hasRole('admin', 'admin')) {
            $adminUser->assignRole('admin', 'admin'); // Specify guard
        }

        // Clear cache again just in case
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Seed sample users for each role
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => bcrypt('password'),
                'role' => 'manager',
            ],
            [
                'name' => 'Customer User',
                'email' => 'customer@example.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
            ],
        ];
        foreach ($users as $userData) {
            $user = \App\Models\User::firstOrCreate(
                ['email' => $userData['email']],
                ['name' => $userData['name'], 'password' => $userData['password']]
            );
            if (! $user->hasRole($userData['role'], 'admin')) {
                $user->assignRole($userData['role'], 'admin');
            }
        }

        // dump('Permissions:', Permission::all()->pluck('id', 'name')->toArray());
        // dump('Roles:', Role::all()->pluck('id', 'name')->toArray());
        // dump('Permission class:', get_class(new Permission));
        // dump('Role class:', get_class(new Role));
    }
}
