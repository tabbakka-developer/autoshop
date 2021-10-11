<?php

namespace App\Services\Api\Auth;

use App\DTO\EmailOrPhoneDTO;
use App\DTO\LoginDTO;
use App\Mappers\AuthMapper;
use App\Models\User;
use App\Repositories\Auth\AuthRepository;

class AuthService
{
    public function __construct(
        public AuthMapper $authMapper,
        public AuthRepository $authRepository
    ) {}

    public function login(LoginDTO $loginDTO)
    {
        if (isset($loginDTO->email)) {
            $credentials = $loginDTO->only([
                'email',
                'password'
            ]);
        } elseif (isset($loginDTO->phone)) {
            $user = $this->authMapper->mapUser(
                $this->authRepository->getByPhoneNumber(
                    $loginDTO->phone
                )
            );
            $loginDTO->email = $user->email;
            $credentials = $loginDTO->only([
                'email',
                'password'
            ]);
        }

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!$user) {
            /** @var User $user */
            $user = auth()->user();
            $user = $this->authMapper->mapUser($user);
        }

        return response()->json([
            'user' => $user->toArray(),
            'token' => $token
        ]);
    }

    public function me()
    {
        /** @var User $user */
        $user = auth()->user();
        $userDto = $this->authMapper->mapUser($user);
        return response()->json([
            'user' => $user->toArray()
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([]);
    }

    public function checkUserRegistered(EmailOrPhoneDTO $emailOrPhoneDTO): bool
    {
        if ($emailOrPhoneDTO->email) {
            return (bool)$this->authRepository->getByEmail($emailOrPhoneDTO->email);
        }

        if ($emailOrPhoneDTO->phone) {
            return (bool)$this->authRepository->getByPhoneNumber($emailOrPhoneDTO->phone);
        }

        return false;
    }
}
