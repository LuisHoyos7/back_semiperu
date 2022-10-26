<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    
    protected $fillable = [
        'id',
        'code',
        'name',
        'type',
    ];

    protected $casts = ['data' => 'array'];

}
