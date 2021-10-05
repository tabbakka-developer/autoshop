<?php

namespace App\DTO\CarsData;

class ListMakersRequestDTO extends \App\Abstracts\DataTransferObjectAbstract
{
    public function __construct(
        public ?int $limit
    ){}
}
