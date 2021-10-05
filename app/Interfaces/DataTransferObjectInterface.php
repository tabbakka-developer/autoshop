<?php

namespace App\Interfaces;

interface DataTransferObjectInterface
{
    public function toArray(): array;

    public function toJson(): string;

    public function only(array $keys): array;
}
