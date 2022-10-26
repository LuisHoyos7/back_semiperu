<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    use HasFactory;
    protected $casts = ['detail' => 'array','files' => 'array','firms' => 'array','voucher' => 'array','data' => 'array'];
}
