<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'quotation_id',
        'payment_price',
        'payment_bank',
        'payment_slip',
        'payment_status',
    ];
}
