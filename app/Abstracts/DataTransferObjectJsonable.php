<?php

namespace App\Abstracts;

abstract class DataTransferObjectJsonable implements \App\Interfaces\DataTransferObjectInterface
{

    public function toArray(): array
    {
        return [];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
