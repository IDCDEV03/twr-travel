<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car_rental_payment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'member_id',
        'code_pay',
        'rent_id',
        'payment_price',
        'payment_bank',
        'payment_slip',
        'pay_num',
    ];
}
