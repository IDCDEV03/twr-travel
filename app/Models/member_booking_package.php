<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_booking_package extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'member_id',
        'member_name',
        'member_email',
        'package_id',
        'number_of_travel',
        'date_start',
        'date_end',
        'member_detail',
        'member_contact',
        'booking_status',
        ];
 
}
