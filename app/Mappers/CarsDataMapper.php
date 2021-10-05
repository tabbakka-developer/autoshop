<?php

namespace App\Mappers;

use App\DTO\CarsData\ListMakersRequestDTO;
use App\DTO\CarsData\MakerByIdRequestDTO;
use App\Http\Requests\CarsData\GetByIdRequest;
use App\Http\Requests\CarsData\ListMakersRequest;
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
}
