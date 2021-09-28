<?php

namespace App\DTO;

use JetBrains\PhpStorm\ArrayShape;

class RegistrationDTO implements \App\Interfaces\DataTransferObjectInterface
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $password
    ) {}

    #[ArrayShape(['name' => "string", 'email' => "string", 'phone' => "string", 'password' => "string"])]
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ];
    }

    /**
     * @throws \JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
