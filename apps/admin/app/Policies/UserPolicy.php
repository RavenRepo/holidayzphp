<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view users');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->hasPermissionTo('view users');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage users');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
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
            'has_permission' => $hasPermission
        ]);
        
        return $hasPermission;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
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
            'has_permission' => $hasPermission
        ]);
        
        return $hasPermission;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasPermissionTo('manage users');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        // Prevent self-deletion
        if ($user->id === $model->id) {
            return false;
        }
        
        return $user->hasPermissionTo('delete user');
    }
} 