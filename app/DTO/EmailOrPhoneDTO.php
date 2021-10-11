<?php

namespace App\DTO;

use App\Abstracts\DataTransferObjectAbstract;

class EmailOrPhoneDTO extends DataTransferObjectAbstract
{
    /**
     * @param string|null $email
     * @param string|null $phone
     */
    public function __construct(
        public ?string $email = null,
        public ?string $phone = null
    ) {}

    public function toArray(): array
    {
        $array = [];
        if (isset($this->email)) {
            $array['email'] = $this->email;
        }
        if (isset($this->phone)) {
            $array['phone'] = $this->phone;
        }

        return $array;
    }
}
