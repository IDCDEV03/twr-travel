<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package_img extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'package_img',
    ];
}
