<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Policy for Package model.
 * Note: This is a placeholder until the Package model is implemented.
 */
class PackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any packages.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view packages');
    }

    /**
     * Determine whether the user can view the package.
     */
    public function view(User $user): bool
    {
        return $user->hasPermissionTo('view packages');
    }

    /**
     * Determine whether the user can create packages.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create package');
    }

    /**
     * Determine whether the user can update the package.
     */
    public function update(User $user): bool
    {
        return $user->hasPermissionTo('edit package');
    }

    /**
     * Determine whether the user can delete the package.
     */
    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('delete package');
    }

    /**
     * Determine whether the user can restore the package.
     */
    public function restore(User $user): bool
    {
        return $user->hasPermissionTo('manage packages');
    }

    /**
     * Determine whether the user can permanently delete the package.
     */
    public function forceDelete(User $user): bool
    {
        return $user->hasPermissionTo('delete package');
    }
}
