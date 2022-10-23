<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;
    protected $casts = ['detalle' => 'array','firmas' => 'array','archivos' => 'array','datos' => 'array'];
}
