<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    use HasFactory;

    Protected $table= "orden_compras";

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

    protected $casts = ['detalles' => 'array', 'firmas' => 'array' , 'archivos' => 'array',  'datos' => 'array' ];
}
