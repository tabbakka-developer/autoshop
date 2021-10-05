<?php

namespace App\DTO;

use App\Abstracts\DataTransferObjectAbstract;
use JetBrains\PhpStorm\ArrayShape;

class RegistrationDTO extends DataTransferObjectAbstract
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $password
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ];
    }
}
