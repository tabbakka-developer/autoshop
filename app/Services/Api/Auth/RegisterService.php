<?php

namespace App\Services\Api\Auth;

use App\DTO\RegistrationDTO;
use App\Http\Resources\UserResource;
use App\Mappers\AuthMapper;
use App\Repositories\Auth\RegisterRepository;
use App\Serializer\AuthSerializer;
use Illuminate\Http\JsonResponse;

class RegisterService
{
    public function __construct(
        private RegisterRepository $registerRepository,
        private AuthMapper $authMapper,
        private AuthSerializer $authSerializer
    ) {}

    /**
     * @param RegistrationDTO $registrationDTO
     * @return JsonResponse
     */
    public function register(RegistrationDTO $registrationDTO): JsonResponse
    {
        $userModel = $this->registerRepository->register($registrationDTO);
        $token = auth()->login($userModel);
        $user = $this->authMapper->mapUser($userModel);

        return $this->authSerializer->serializeRegistration($user, $token);
    }
}
