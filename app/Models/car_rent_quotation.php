<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car_rent_quotation extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'rent_id',
        'car_quotation',
        'total_price',
        'price_deposit',
        'car_quotation_detail',
        'car_rental_file',
    ];
}
