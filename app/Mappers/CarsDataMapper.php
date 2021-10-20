<?php

namespace App\Mappers;

use App\DTO\CarsData\GroupByIdRequestDTO;
use App\DTO\CarsData\ListGroupsRequestDTO;
use App\DTO\CarsData\ListMakersRequestDTO;
use App\DTO\CarsData\MakerByIdRequestDTO;
use App\Http\Requests\CarsData\GetByIdRequest;
use App\Http\Requests\CarsData\ListGroupsRequest;
use App\Http\Requests\CarsData\ListMakersRequest;
use App\Http\Requests\GetGroupByIdRequest;
use App\Models\CarMakers;
use Illuminate\Http\JsonResponse;

class CarsDataMapper
{
    public function mapListMakersRequest(ListMakersRequest $request): ListMakersRequestDTO
    {
        return new ListMakersRequestDTO($request->limit ?? null);
    }

    public function mapListMakersResponse($makersData): JsonResponse
    {
        return response()->json($makersData);
    }

    public function mapGetByIdRequest(GetByIdRequest $request): MakerByIdRequestDTO
    {
        return new MakerByIdRequestDTO($request->id);
    }

    public function mapSingleCarMaker($maker): JsonResponse
    {
        return response()->json($maker);
    }

    public function mapListGroupsRequest(ListGroupsRequest $request): ListGroupsRequestDTO
    {
        return new ListGroupsRequestDTO($request->limit, $request->car_maker_id);
    }

    public function mapSingleCarGroup($group): JsonResponse
    {
        return response()->json($group);
    }

    public function mapListGroupsResponse($groupsData): JsonResponse
    {
        return response()->json($groupsData);
    }

    public function mapGetGroupByIdRequest(GetGroupByIdRequest $request)
    {
        return new GroupByIdRequestDTO($request->id);
    }
}
