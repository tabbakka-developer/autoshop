<?php

namespace App\Mappers;

use App\DTO\RegistrationDTO;
use App\Http\Requests\Auth\RegistrationRequest;

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
}
