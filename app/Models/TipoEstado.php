<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    use HasFactory;

    Protected $table="clients";

    protected $fillable = [
        'id',
        'code',
        'name',
        'type',
    ];
    protected $casts = ['datos' => 'array'];
}
