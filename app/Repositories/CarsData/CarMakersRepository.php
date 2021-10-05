<?php

namespace App\Repositories\CarsData;

use App\DTO\CarsData\ListMakersRequestDTO;
use App\Models\CarMakers;
use Illuminate\Pagination\LengthAwarePaginator;

class CarMakersRepository
{
    /**
     * @param int $limitPerPage
     * @return LengthAwarePaginator
     */
    public function getCollectionPaginated(int $limitPerPage): LengthAwarePaginator
    {
        return CarMakers::query()
            ->paginate($limitPerPage);
    }

    public function getCollection()
    {
        return CarMakers::all();
    }
}
