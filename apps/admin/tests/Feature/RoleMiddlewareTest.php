<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Ensure a user without the required role receives 403 on /dashboard.
     */
    public function test_non_privileged_user_cannot_access_dashboard(): void
    {
        // Arrange: create user without role
        $user = User::factory()->create();

        // Act: hit the dashboard as this user
        $response = $this->actingAs($user, 'admin')->get('/dashboard');

        // Assert: forbidden
        $response->assertStatus(403);
    }

    /**
     * Ensure an admin-role user can access /dashboard.
     */
    public function test_admin_user_can_access_dashboard(): void
    {
        // Arrange: create admin role (UUID primary key)
        $adminRole = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'admin',
            'guard_name' => 'admin',
        ]);

        // Create a user and assign the admin role
        $admin = User::factory()->create();
        $admin->assignRole($adminRole);

        // Act: hit the dashboard as admin
        $response = $this->actingAs($admin, 'admin')->get('/dashboard');

        // Assert: success
        $response->assertStatus(200);
    }
}
