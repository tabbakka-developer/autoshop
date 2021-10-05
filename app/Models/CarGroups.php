<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGroups extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'title_formatted',
        'alias',
        'car_maker_id'
    ];

    public function carMaker()
    {
        return $this->belongsTo(CarMakers::class, 'car_maker_id', 'id');
    }
}
