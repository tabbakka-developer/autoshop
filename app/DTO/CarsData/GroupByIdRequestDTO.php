<?php

namespace App\DTO\CarsData;

use App\Abstracts\DataTransferObjectAbstract;

class GroupByIdRequestDTO extends DataTransferObjectAbstract
{
    public function __construct(
        public int $id
    ) {}
}
