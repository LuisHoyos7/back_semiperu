<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubWork extends Model
{
    use HasFactory;
    protected $casts = ['data' => 'array'];
}
