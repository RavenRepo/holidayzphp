<?php

namespace App\Policies;

use App\Models\User;
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
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view blogs');
    }

    /**
     * Determine whether the user can view the blog.
     */
    public function view(User $user): bool
    {
        return $user->hasPermissionTo('view blogs');
    }

    /**
     * Determine whether the user can create blogs.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create blog');
    }

    /**
     * Determine whether the user can update the blog.
     */
    public function update(User $user): bool
    {
        return $user->hasPermissionTo('edit blog');
    }

    /**
     * Determine whether the user can delete the blog.
     */
    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('delete blog');
    }

    /**
     * Determine whether the user can restore the blog.
     */
    public function restore(User $user): bool
    {
        return $user->hasPermissionTo('manage blogs');
    }

    /**
     * Determine whether the user can permanently delete the blog.
     */
    public function forceDelete(User $user): bool
    {
        return $user->hasPermissionTo('delete blog');
    }
} 