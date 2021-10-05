<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsData\ListGroupsRequest;
use App\Models\CarGroups;
use Illuminate\Http\Request;

class CarGroupsController extends Controller
{
    public function index(ListGroupsRequest $request)
    {
        return response()
            ->json(
                CarGroups::query()->where('car_maker_id', $request->car_maker_id)
                ->with('carMaker')
                ->get()
            );
    }
}
