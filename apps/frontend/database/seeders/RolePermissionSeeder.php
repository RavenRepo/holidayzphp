<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Only truncate tables in local, testing environments
        if (app()->environment('local', 'testing')) {
            DB::table('role_has_permissions')->truncate();
            DB::table('model_has_roles')->truncate();
            DB::table('model_has_permissions')->truncate();
            DB::table('roles')->truncate();
            DB::table('permissions')->truncate();
        }

        // Define roles and permissions
        $roles = [
            'user',
            'premium_user',
            'verified_traveler',
            'content_creator',
        ];

        $permissions = [
            'view packages',
            'book package',
            'cancel booking',
            'submit review',
            'access premium content',
            'create travel story',
            'view bookings',
        ];

        // Create permissions with explicit UUIDs
        $permissionIds = [];
        foreach ($permissions as $permission) {
            $perm = Permission::create([
                'id' => (string) Str::uuid(),
                'name' => $permission,
                'guard_name' => 'web',
            ]);
            $permissionIds[] = $perm->id;
        }

        // Create roles with explicit UUIDs
        $roleIds = [];
        foreach ($roles as $role) {
            $roleModel = Role::create([
                'id' => (string) Str::uuid(),
                'name' => $role,
                'guard_name' => 'web',
            ]);
            $roleIds[$role] = $roleModel->id;
        }

        // Assign permissions to roles
        $basicPermissions = [
            'view packages',
            'book package',
            'cancel booking',
            'view bookings',
        ];

        $premiumPermissions = [
            'view packages',
            'book package',
            'cancel booking',
            'submit review',
            'access premium content',
            'view bookings',
        ];

        $verifiedPermissions = [
            'view packages',
            'book package',
            'cancel booking',
            'submit review',
            'view bookings',
        ];

        $contentCreatorPermissions = [
            'view packages',
            'book package',
            'cancel booking',
            'submit review',
            'create travel story',
            'view bookings',
        ];

        // Assign permissions to user role
        $userRole = Role::where('name', 'user')->where('guard_name', 'web')->first();
        if ($userRole) {
            $userRole->givePermissionTo($basicPermissions);
        }

        // Assign permissions to premium_user role
        $premiumRole = Role::where('name', 'premium_user')->where('guard_name', 'web')->first();
        if ($premiumRole) {
            $premiumRole->givePermissionTo($premiumPermissions);
        }

        // Assign permissions to verified_traveler role
        $verifiedRole = Role::where('name', 'verified_traveler')->where('guard_name', 'web')->first();
        if ($verifiedRole) {
            $verifiedRole->givePermissionTo($verifiedPermissions);
        }

        // Assign permissions to content_creator role
        $creatorRole = Role::where('name', 'content_creator')->where('guard_name', 'web')->first();
        if ($creatorRole) {
            $creatorRole->givePermissionTo($contentCreatorPermissions);
        }

        // Assign user role to all existing users
        User::all()->each(function ($user) {
            if (! $user->hasRole('user')) {
                $user->assignRole('user');
            }
        });

        // Clear permission cache
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
