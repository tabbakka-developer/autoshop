<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMakers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alias',
        'title',
        'title_formatted'
    ];
}
