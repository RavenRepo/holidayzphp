<?php

namespace Tests\Unit\Policies;

use App\Models\User;
use App\Policies\BlogPolicy;
use Tests\TestCase;

class BlogPolicyTest extends TestCase
{
    protected BlogPolicy $policy;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new BlogPolicy();
    }
    
    /**
     * @test
     */
    public function it_allows_viewing_blogs_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['view blogs']);
        
        // Act & Assert
        $this->assertTrue($this->policy->viewAny($user));
    }
    
    /**
     * @test
     */
    public function it_denies_viewing_blogs_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);
        
        // Act & Assert
        $this->assertFalse($this->policy->viewAny($user));
    }
    
    /**
     * @test
     */
    public function it_allows_viewing_blog_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['view blogs']);
        
        // Act & Assert
        $this->assertTrue($this->policy->view($user));
    }
    
    /**
     * @test
     */
    public function it_allows_creating_blog_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['create blog']);
        
        // Act & Assert
        $this->assertTrue($this->policy->create($user));
    }
    
    /**
     * @test
     */
    public function it_denies_creating_blog_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);
        
        // Act & Assert
        $this->assertFalse($this->policy->create($user));
    }
    
    /**
     * @test
     */
    public function it_allows_updating_blog_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['edit blog']);
        
        // Act & Assert
        $this->assertTrue($this->policy->update($user));
    }
    
    /**
     * @test
     */
    public function it_denies_updating_blog_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);
        
        // Act & Assert
        $this->assertFalse($this->policy->update($user));
    }
    
    /**
     * @test
     */
    public function it_allows_deleting_blog_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['delete blog']);
        
        // Act & Assert
        $this->assertTrue($this->policy->delete($user));
    }
    
    /**
     * @test
     */
    public function it_denies_deleting_blog_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);
        
        // Act & Assert
        $this->assertFalse($this->policy->delete($user));
    }
    
    /**
     * @test
     */
    public function it_allows_restoring_blog_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['manage blogs']);
        
        // Act & Assert
        $this->assertTrue($this->policy->restore($user));
    }
    
    /**
     * @test
     */
    public function it_allows_force_deleting_blog_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['delete blog']);
        
        // Act & Assert
        $this->assertTrue($this->policy->forceDelete($user));
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
} 