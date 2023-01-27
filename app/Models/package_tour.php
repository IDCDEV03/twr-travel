<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package_tour extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'package_id',
        'package_cover',
        'package_name',
        'package_place',
        'package_type',
        'code_tour',
        'package_veh',
        'package_min_customer',
        'package_total_day',
        'package_period_start',
        'package_period_end',
        'package_price',
        'package_file',
        'package_deposit',
        'highlight_tour',
        'package_detail',
        'package_status'
        ];
}
