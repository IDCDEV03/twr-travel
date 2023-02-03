<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_car_rent extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'rent_id',
        'car_type',
        'start_province',
        'start_district',
        'start_place',
        'end_province',
        'end_district',
        'end_place',
        'start_travel',
        'back_travel',
        'car_for',
        'travel_detail',
        'travel_detail_file',
        'number_people',
        'number_of_car',
        'member_id',
        'member_name',
        'member_email',
        'member_company',
        'member_phone',
        'other_req'
        ];
}
