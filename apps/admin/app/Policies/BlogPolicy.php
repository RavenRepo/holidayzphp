<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Policy for Blog model.
 * Note: This is a placeholder until the Blog model is implemented.
 */
class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any blogs.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function viewAny($user): bool
    {
        return $user->hasPermissionTo('view blogs');
    }

    /**
     * Determine whether the user can view the blog.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function view($user): bool
    {
        return $user->hasPermissionTo('view blogs');
    }

    /**
     * Determine whether the user can create blogs.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function create($user): bool
    {
        return $user->hasPermissionTo('create blog');
    }

    /**
     * Determine whether the user can update the blog.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function update($user): bool
    {
        return $user->hasPermissionTo('edit blog');
    }

    /**
     * Determine whether the user can delete the blog.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function delete($user): bool
    {
        return $user->hasPermissionTo('delete blog');
    }

    /**
     * Determine whether the user can restore the blog.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function restore($user): bool
    {
        return $user->hasPermissionTo('manage blogs');
    }

    /**
     * Determine whether the user can permanently delete the blog.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function forceDelete($user): bool
    {
        return $user->hasPermissionTo('delete blog');
    }
}
