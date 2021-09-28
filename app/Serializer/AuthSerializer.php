<?php

namespace App\Serializer;

use App\DTO\UserDTO;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class AuthSerializer
{
    /**
     * @param UserDTO $user
     * @param string $token
     * @return JsonResponse
     */
    public function serializeRegistration(UserDTO $user, string $token): JsonResponse
    {
        return response()->json([
            'data' => [
                'user' => new UserResource($user),
                'token' => [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => time() + (auth()->factory()->getTTL() * 60)
                ]
            ]
        ], 201);
    }
}
