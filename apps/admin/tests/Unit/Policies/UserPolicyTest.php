<?php

namespace Tests\Unit\Policies;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserPolicyTest extends TestCase
{
    protected UserPolicy $policy;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new UserPolicy();
    }
    
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
    
    /**
     * @test
     */
    public function it_allows_viewing_users_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['view users']);
        
        // Act & Assert
        $this->assertTrue($this->policy->viewAny($user));
    }
    
    /**
     * @test
     */
    public function it_denies_viewing_users_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);
        
        // Act & Assert
        $this->assertFalse($this->policy->viewAny($user));
    }
    
    /**
     * @test
     */
    public function it_allows_viewing_user_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['view users']);
        $subject = $this->getTestUser();
        
        // Act & Assert
        $this->assertTrue($this->policy->view($user, $subject));
    }
    
    /**
     * @test
     */
    public function it_allows_creating_users_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['manage users']);
        
        // Act & Assert
        $this->assertTrue($this->policy->create($user));
    }
    
    /**
     * @test
     */
    public function it_allows_updating_self_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);
        $user->id = 'user-1';
        
        $subject = $this->getTestUser();
        $subject->id = 'user-1';
        
        // Act & Assert
        $this->assertTrue($this->policy->update($user, $subject));
    }
    
    /**
     * @test
     */
    public function it_denies_updating_others_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithoutPermissions();
        $user->id = 'user-1';
        
        $subject = $this->getTestUser();
        $subject->id = 'user-2';
        
        // Act & Assert
        // Check what hasPermissionTo is returning 
        $hasPermission = $user->hasPermissionTo('edit user');
        $this->assertFalse($hasPermission, 'User should not have edit permission');
        
        $result = $this->policy->update($user, $subject);
        $this->assertFalse($result, 'Policy should deny update');
    }
    
    /**
     * @test
     */
    public function it_allows_updating_others_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['edit user']);
        $user->id = 'user-1';
        
        $subject = $this->getTestUser();
        $subject->id = 'user-2';
        
        // Act & Assert
        $this->assertTrue($this->policy->update($user, $subject));
    }
    
    /**
     * @test
     */
    public function it_prevents_self_deletion()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['delete user']);
        $user->id = 'user-1';
        
        $subject = $this->getTestUser();
        $subject->id = 'user-1';
        
        // Act & Assert
        $this->assertFalse($this->policy->delete($user, $subject));
    }
    
    /**
     * @test
     */
    public function it_allows_deleting_others_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithExplicitPermission('delete user');
        $user->id = 'user-1';
        
        $subject = $this->getTestUser();
        $subject->id = 'user-2';
        
        // Verify mock works correctly
        $hasPermission = $user->hasPermissionTo('delete user');
        $this->assertTrue($hasPermission, 'Mock should have delete permission');
        
        // Act & Assert
        $result = $this->policy->delete($user, $subject);
        $this->assertTrue($result, 'Policy should allow deletion');
    }
    
    /**
     * @test
     */
    public function it_allows_restoring_users_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['manage users']);
        $subject = $this->getTestUser();
        
        // Act & Assert
        $this->assertTrue($this->policy->restore($user, $subject));
    }
    
    /**
     * @test
     */
    public function it_prevents_force_deleting_self()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['delete user']);
        $user->id = 'user-1';
        
        $subject = $this->getTestUser();
        $subject->id = 'user-1';
        
        // Act & Assert
        $this->assertFalse($this->policy->forceDelete($user, $subject));
    }
    
    /**
     * Helper method to mock a user with permissions
     */
    private function mockUserWithPermissions(array $permissions): User
    {
        $user = $this->createMock(User::class);
        
        $user->expects($this->any())
            ->method('hasPermissionTo')
            ->willReturnCallback(function ($permission) use ($permissions) {
                return in_array($permission, $permissions);
            });
            
        return $user;
    }
    
    /**
     * Helper method to mock a user without any permissions
     */
    private function mockUserWithoutPermissions(): User
    {
        $user = $this->createMock(User::class);
        
        $user->expects($this->any())
            ->method('hasPermissionTo')
            ->willReturn(false);
            
        return $user;
    }
    
    /**
     * Helper method to mock a user with a specific permission
     */
    private function mockUserWithExplicitPermission(string $permission): User
    {
        $user = $this->createMock(User::class);
        
        $user->expects($this->any())
            ->method('hasPermissionTo')
            ->willReturnCallback(function ($requestedPermission) use ($permission) {
                return $requestedPermission === $permission;
            });
            
        return $user;
    }
    
    /**
     * Get a test user without any mocked methods
     */
    private function getTestUser(): User
    {
        return $this->createMock(User::class);
    }
} 