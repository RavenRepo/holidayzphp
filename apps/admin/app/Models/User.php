<?php

namespace App\Models;

use Holidayz\Packages\Core\Models\User as CoreUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends CoreUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The guard that should be used for authentication.
     *
     * @var string
     */
    protected string $guard = 'admin';
}
