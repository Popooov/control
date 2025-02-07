<?php

namespace App\Policies;

use App\Models\User;

class RegisteredUserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user): bool
    {
        return $user->is($user) && $user->alias === 'admin';
    }
}
