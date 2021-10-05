<?php

namespace App\DTO\CarsData;

class MakerByIdRequestDTO extends \App\Abstracts\DataTransferObjectAbstract
{
    public function __construct(
        public int $id
    ) {}
}
