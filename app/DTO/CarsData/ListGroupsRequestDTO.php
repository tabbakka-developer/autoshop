<?php

namespace App\DTO\CarsData;

use App\Abstracts\DataTransferObjectAbstract;

class ListGroupsRequestDTO extends DataTransferObjectAbstract
{
    public function __construct(
        public ?int $limit,
        public ?int $makerId
    ){}
}
