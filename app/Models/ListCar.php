<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListCar extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'car_id',
        'car_name',
        'car_number',
        'car_book'
    ];
}
