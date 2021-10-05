<?php

namespace App\Services\Api\CarsData;

use App\DTO\CarsData\ListMakersRequestDTO;
use App\DTO\CarsData\MakerByIdRequestDTO;
use App\Repositories\CarsData\CarMakersRepository;

class CarsDataService
{
    public function __construct(
        private CarMakersRepository $makersRepository
    ) {}

    public function listMakers(ListMakersRequestDTO $requestDTO)
    {
        if ($requestDTO->limit) {
            return $this->makersRepository->getCollectionPaginated($requestDTO->limit);
        }

        return $this->makersRepository->getCollection();
    }

    public function getById(MakerByIdRequestDTO $requestDTO)
    {
        return $this->makersRepository->findById($requestDTO->id);
    }
}
