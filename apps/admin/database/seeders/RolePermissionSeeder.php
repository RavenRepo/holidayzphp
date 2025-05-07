<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Only truncate tables in local, testing environments
        if (app()->environment('local', 'testing')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('role_has_permissions')->truncate();
            DB::table('model_has_roles')->truncate();
            DB::table('model_has_permissions')->truncate();
            DB::table('roles')->truncate();
            DB::table('permissions')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // Clear permission cache after truncation
            app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
        }

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

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create([
                'id' => (string) Str::uuid(),
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }

        // Create roles
        foreach ($roles as $role) {
            Role::create([
                'id' => (string) Str::uuid(),
                'name' => $role,
                'guard_name' => 'admin',
            ]);
        }

        // Reload permissions and roles from the database
        $allPermissions = Permission::pluck('name')->toArray();
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'admin')->first();
        if ($adminRole) {
            $adminRole->givePermissionTo($allPermissions);
        }

        // Assign admin role to the first user (if exists)
        $adminUser = User::first();
        if ($adminUser && !$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }

        // Clear permission cache again after assignments
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }
} 