<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $casts = ['managements' => 'array','areas' => 'array','sites' => 'array','data' => 'array'];
}
