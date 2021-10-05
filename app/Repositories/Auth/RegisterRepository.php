<?php

namespace App\Repositories\Auth;

use App\DTO\RegistrationDTO;
use App\Models\User;

class RegisterRepository
{
    /**
     * @param RegistrationDTO $registrationDTO
     * @return User
     */
    public function register(RegistrationDTO $registrationDTO): User
    {
        $user = new User();
        $user->name = $registrationDTO?->name;
        $user->phone = $registrationDTO->phone;
        $user->password = $registrationDTO->password;
        $user->email = $registrationDTO->email;
        $user->save();

        return $user;
    }
}
