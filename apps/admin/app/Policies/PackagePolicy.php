<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
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
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function viewAny($user): bool
    {
        return $user->hasPermissionTo('view packages');
    }

    /**
     * Determine whether the user can view the package.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function view($user): bool
    {
        return $user->hasPermissionTo('view packages');
    }

    /**
     * Determine whether the user can create packages.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function create($user): bool
    {
        return $user->hasPermissionTo('create package');
    }

    /**
     * Determine whether the user can update the package.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function update($user): bool
    {
        return $user->hasPermissionTo('edit package');
    }

    /**
     * Determine whether the user can delete the package.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function delete($user): bool
    {
        return $user->hasPermissionTo('delete package');
    }

    /**
     * Determine whether the user can restore the package.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function restore($user): bool
    {
        return $user->hasPermissionTo('manage packages');
    }

    /**
     * Determine whether the user can permanently delete the package.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function forceDelete($user): bool
    {
        return $user->hasPermissionTo('delete package');
    }
}
