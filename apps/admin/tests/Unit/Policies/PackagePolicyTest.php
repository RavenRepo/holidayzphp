<?php

namespace Tests\Unit\Policies;

use App\Models\User;
use App\Policies\PackagePolicy;
use Tests\TestCase;

class PackagePolicyTest extends TestCase
{
    protected PackagePolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new PackagePolicy;
    }

    /**
     * @test
     */
    public function it_allows_viewing_packages_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['view packages']);

        // Act & Assert
        $this->assertTrue($this->policy->viewAny($user));
    }

    /**
     * @test
     */
    public function it_denies_viewing_packages_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);

        // Act & Assert
        $this->assertFalse($this->policy->viewAny($user));
    }

    /**
     * @test
     */
    public function it_allows_viewing_package_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['view packages']);

        // Act & Assert
        $this->assertTrue($this->policy->view($user));
    }

    /**
     * @test
     */
    public function it_allows_creating_package_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['create package']);

        // Act & Assert
        $this->assertTrue($this->policy->create($user));
    }

    /**
     * @test
     */
    public function it_denies_creating_package_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);

        // Act & Assert
        $this->assertFalse($this->policy->create($user));
    }

    /**
     * @test
     */
    public function it_allows_updating_package_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['edit package']);

        // Act & Assert
        $this->assertTrue($this->policy->update($user));
    }

    /**
     * @test
     */
    public function it_denies_updating_package_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);

        // Act & Assert
        $this->assertFalse($this->policy->update($user));
    }

    /**
     * @test
     */
    public function it_allows_deleting_package_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['delete package']);

        // Act & Assert
        $this->assertTrue($this->policy->delete($user));
    }

    /**
     * @test
     */
    public function it_denies_deleting_package_without_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions([]);

        // Act & Assert
        $this->assertFalse($this->policy->delete($user));
    }

    /**
     * @test
     */
    public function it_allows_restoring_package_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['manage packages']);

        // Act & Assert
        $this->assertTrue($this->policy->restore($user));
    }

    /**
     * @test
     */
    public function it_allows_force_deleting_package_with_permission()
    {
        // Arrange
        $user = $this->mockUserWithPermissions(['delete package']);

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
