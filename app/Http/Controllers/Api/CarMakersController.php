<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsData\GetByIdRequest;
use App\Http\Requests\CarsData\ListMakersRequest;
use App\Mappers\CarsDataMapper;
use App\Services\Api\CarsData\CarsDataService;
use Illuminate\Http\Request;

class CarMakersController extends Controller
{
    public function __construct(
        private CarsDataMapper $carsDataMapper,
        private CarsDataService $carsDataService
    ){}

    public function index(ListMakersRequest $request)
    {
        return $this->carsDataMapper->mapListMakersResponse(
            $this->carsDataService->listMakers(
                $this->carsDataMapper->mapListMakersRequest($request)
            )
        );
    }

    public function getById(GetByIdRequest $request)
    {
        return $this->carsDataMapper->mapSingleCarMaker(
            $this->carsDataService->getMakerById(
                $this->carsDataMapper->mapGetByIdRequest($request)
            )
        );
    }
}
