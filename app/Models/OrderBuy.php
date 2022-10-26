<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitudCompra_id',
        'tipoEstado_id',
        'cod',
        'nombre',
        'detalle',
        'firmas',
        'archivos',
        'datos',
    ];

    protected $casts = ['detail' => 'array','files' => 'array','firms' => 'array','data' => 'array'];
}
