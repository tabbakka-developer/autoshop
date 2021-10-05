<?php

namespace App\DTO;

use App\Abstracts\DataTransferObjectAbstract;

class LoginDTO extends DataTransferObjectAbstract
{
    /**
     * @param string|null $email
     * @param string|null $phone
     * @param string $password
     */
    public function __construct(
        public string  $password,
        public ?string $email = null,
        public ?string $phone = null
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
