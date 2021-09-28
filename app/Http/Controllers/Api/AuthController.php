<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Mappers\AuthMapper;
use App\Services\Api\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private RegisterService $registerService,
        private AuthMapper $authMapper
    ) {}

    public function registration(RegistrationRequest $request)
    {
        $this->registerService->register(
            $this->authMapper->mapRegistrationData($request)
        );
    }
}
