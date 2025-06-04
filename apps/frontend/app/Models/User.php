<?php

namespace App\Models;

use App\Traits\HasUuid;
use Holidayz\Packages\Core\Models\User as CoreUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends CoreUser
{
    use HasFactory, HasUuid;
    
    /**
     * The default guard for this user model.
     */
    protected $guard_name = 'web';
}
