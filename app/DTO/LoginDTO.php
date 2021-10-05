<?php

namespace App\DTO;

use App\Abstracts\DataTransferObjectAbstract;

class LoginDTO extends DataTransferObjectAbstract
{
    /**
     * @param string $email
     * @param string $phone
     * @param string $password
     */
    public function __construct(
        public string $email,
        public string $phone,
        public string $password
    ) {}

    public function toArray(): array
    {
        return [];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
