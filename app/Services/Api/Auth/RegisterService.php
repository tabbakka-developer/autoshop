<?php

namespace App\Services\Api\Auth;

use App\DTO\RegistrationDTO;
use App\Repositories\Auth\RegisterRepository;

class RegisterService
{
    public function __construct(
        private RegisterRepository $registerRepository
    ) {}

    public function register(RegistrationDTO $registrationDTO)
    {
        $user = $this->registerRepository->register($registrationDTO);
        $token = auth()->login($user);

        $httpResponse = response()->json([
            'data' => [
                'user' => $user,
                'token' => [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => time() + (auth()->factory()->getTTL() * 60)
                ]
            ]
        ], 201);
    }
}
