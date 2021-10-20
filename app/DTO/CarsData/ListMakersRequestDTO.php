<?php

namespace App\DTO\CarsData;

use App\Abstracts\DataTransferObjectAbstract;

class ListMakersRequestDTO extends DataTransferObjectAbstract
{
    public function __construct(
        public ?int $limit
    ){}
}
