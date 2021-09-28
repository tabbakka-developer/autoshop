<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Mappers\AuthMapper;
use App\Services\Api\Auth\AuthService;
use App\Services\Api\Auth\RegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private RegisterService $registerService,
        private AuthMapper $authMapper,
        private AuthService $authService
    ) {}

    public function registration(RegistrationRequest $request): JsonResponse
    {
        return $this->registerService->register(
            $this->authMapper->mapRegistrationData($request)
        );
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->
    }
}
