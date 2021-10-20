<?php

namespace App\Repositories\CarsData;

use App\Models\CarGroups;

class CarGroupsRepository
{
    /**
     * @return CarGroups[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCollection()
    {
        return CarGroups::all();
    }

    /**
     * @param int $limitPerPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCollectionPaginated(int $limitPerPage)
    {
        return CarGroups::query()->paginate($limitPerPage);
    }

    public function findById(int $id)
    {
        return CarGroups::query()->find($id);
    }
}
