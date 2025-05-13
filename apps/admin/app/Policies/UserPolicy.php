<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function viewAny($user): bool
    {
        return $user->hasPermissionTo('view users');
    }

    /**
     * Determine whether the user can view the model.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     * @param \App\Models\User $model
     */
    public function view($user, User $model): bool
    {
        return $user->hasPermissionTo('view users');
    }

    /**
     * Determine whether the user can create models.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     */
    public function create($user): bool
    {
        return $user->hasPermissionTo('manage users');
    }

    /**
     * Determine whether the user can update the model.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     * @param \App\Models\User $model
     */
    public function update($user, User $model): bool
    {
        // Check if user is Admin model (always has permission to edit users)
        if ($user instanceof Admin) {
            return $user->hasPermissionTo('edit user');
        }
        
        // Users can edit themselves, otherwise need permission
        if ($user->id === $model->id) {
            // Self-edit allowed
            Log::info('Self-edit allowed', ['user_id' => $user->id, 'model_id' => $model->id]);

            return true;
        }

        // Editing others needs permission
        $hasPermission = $user->hasPermissionTo('edit user');
        Log::info('Edit others permission check', [
            'user_id' => $user->id,
            'model_id' => $model->id,
            'has_permission' => $hasPermission,
        ]);

        return $hasPermission;
    }

    /**
     * Determine whether the user can delete the model.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     * @param \App\Models\User $model
     */
    public function delete($user, User $model): bool
    {
        // Check if user is Admin model (always has permission to delete users)
        if ($user instanceof Admin) {
            return $user->hasPermissionTo('delete user');
        }
        
        // Prevent self-deletion
        if ($user->id === $model->id) {
            Log::info('Self-deletion prevented', ['user_id' => $user->id]);

            return false;
        }

        // Deleting others needs permission
        $hasPermission = $user->hasPermissionTo('delete user');
        Log::info('Delete user permission check', [
            'user_id' => $user->id,
            'model_id' => $model->id,
            'has_permission' => $hasPermission,
        ]);

        return $hasPermission;
    }

    /**
     * Determine whether the user can restore the model.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     * @param \App\Models\User $model
     */
    public function restore($user, User $model): bool
    {
        return $user->hasPermissionTo('manage users');
    }

    /**
     * Determine whether the user can permanently delete the model.
     * 
     * @param \App\Models\User|\App\Models\Admin $user
     * @param \App\Models\User $model
     */
    public function forceDelete($user, User $model): bool
    {
        // Check if user is Admin model (always has permission to force delete users)
        if ($user instanceof Admin) {
            return $user->hasPermissionTo('delete user');
        }
        
        // Prevent self-deletion
        if ($user->id === $model->id) {
            return false;
        }

        return $user->hasPermissionTo('delete user');
    }
}
