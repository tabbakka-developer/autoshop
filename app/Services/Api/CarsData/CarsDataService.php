<?php

namespace App\Services\Api\CarsData;

use App\DTO\CarsData\GroupByIdRequestDTO;
use App\DTO\CarsData\ListGroupsRequestDTO;
use App\DTO\CarsData\ListMakersRequestDTO;
use App\DTO\CarsData\MakerByIdRequestDTO;
use App\Repositories\CarsData\CarGroupsRepository;
use App\Repositories\CarsData\CarMakersRepository;

class CarsDataService
{
    public function __construct(
        private CarMakersRepository $makersRepository,
        private CarGroupsRepository $carGroupsRepository
    ) {}

    public function listMakers(ListMakersRequestDTO $requestDTO)
    {
        if ($requestDTO->limit) {
            return $this->makersRepository->getCollectionPaginated($requestDTO->limit);
        }

        return $this->makersRepository->getCollection();
    }

    public function getMakerById(MakerByIdRequestDTO $requestDTO)
    {
        return $this->makersRepository->findById($requestDTO->id);
    }

    public function listGroups(ListGroupsRequestDTO $requestDTO)
    {
        if ($requestDTO->limit) {
            return $this->carGroupsRepository->getCollectionPaginated($requestDTO->limit);
        }

        return $this->carGroupsRepository->getCollection();
    }

    public function getGroupById(GroupByIdRequestDTO $requestDTO)
    {
        return $this->carGroupsRepository->findById($requestDTO->id);
    }
}
