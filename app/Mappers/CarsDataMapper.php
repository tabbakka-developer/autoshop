<?php

namespace App\Mappers;

use App\DTO\CarsData\ListMakersRequestDTO;
use App\Http\Requests\CarsData\ListMakersRequest;

class CarsDataMapper
{
    public function mapListMakersRequest(ListMakersRequest $request): ListMakersRequestDTO
    {
        return new ListMakersRequestDTO($request->limit ?? null);
    }

    public function mapListMakersResponse($makersData)
    {
        return response()->json($makersData);
    }
}
