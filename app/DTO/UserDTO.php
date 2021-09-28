<?php

namespace App\DTO;

use Carbon\Carbon;
use App\Abstracts\DataTransferObjectJsonable;

class UserDTO extends DataTransferObjectJsonable
{

    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $phone,
        public Carbon $created_at,
        public Carbon $updated_at
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
