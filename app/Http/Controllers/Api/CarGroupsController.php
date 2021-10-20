<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsData\ListGroupsRequest;
use App\Http\Requests\GetGroupByIdRequest;
use App\Mappers\CarsDataMapper;
use App\Models\CarGroups;
use App\Services\Api\CarsData\CarsDataService;
use Illuminate\Http\Request;

class CarGroupsController extends Controller
{
    public function __construct(
        private CarsDataMapper $carsDataMapper,
        private CarsDataService $carsDataService
    ){}

    public function index(ListGroupsRequest $request)
    {
        return $this->carsDataMapper->mapListGroupsResponse(
            $this->carsDataService->listGroups(
                $this->carsDataMapper->mapListGroupsRequest($request)
            )
        );
    }

    public function getById(GetGroupByIdRequest $request)
    {
        return $this->carsDataMapper->mapSingleCarGroup(
            $this->carsDataService->getGroupById(
                $this->carsDataMapper->mapGetGroupByIdRequest($request)
            )
        );
    }
}
