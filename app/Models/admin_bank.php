<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin_bank extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'bank_name',
        'bank_account_name',
        'account_number',        
        'bank_branch',
    ];
}
