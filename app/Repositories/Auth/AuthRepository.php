<?php

namespace App\Repositories\Auth;

use App\Models\User;

class AuthRepository
{
    public function __construct()
    {
    }

    public function getByPhoneNumber(string $phoneNumber): User|null
    {
        /** @var User $user */
        $user = User::query()->where('phone', $phoneNumber)->first();
        return $user;
    }

    public function getByEmail(string $email): User|null
    {
        /** @var User $user */
        $user = User::query()->where('email', $email)->first();
        return $user;
    }
}
