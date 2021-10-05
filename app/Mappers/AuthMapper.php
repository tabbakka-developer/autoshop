<?php

namespace App\Mappers;

use App\DTO\LoginDTO;
use App\DTO\RegistrationDTO;
use App\DTO\UserDTO;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;

class AuthMapper
{
    public function mapRegistrationData(RegistrationRequest $request): RegistrationDTO
    {
        return new RegistrationDTO(
            $request?->name,
            $request?->email,
            $request?->phone,
            $request?->password
        );
    }

    public function mapUser(User $user): UserDTO
    {
        return new UserDTO(
            $user->id,
            $user?->name,
            $user->email,
            $user->phone,
            $user->created_at,
            $user->updated_at
        );
    }

    public function mapLoginData(LoginRequest $request): LoginDTO
    {
        return new LoginDTO(
            $request->password,
            $request?->email,
            $request?->phone
        );
    }
}
