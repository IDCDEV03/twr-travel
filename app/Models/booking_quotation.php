<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_quotation extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'quotation_id',
        'package_id',        
        'total_price',
        'price_deposit',
        'package_file',
        'quotation_detail',     
    ];
}
