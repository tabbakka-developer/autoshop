<?php

namespace App\Interfaces;

interface OnlyDTOInterface extends DataTransferObjectInterface
{
    public function only(array $keys): array;
}
