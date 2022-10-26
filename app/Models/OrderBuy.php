<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    use HasFactory;
<<<<<<< HEAD

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
=======
    protected $casts = ['detail' => 'array','files' => 'array','firms' => 'array','data' => 'array'];
>>>>>>> 14c3a9dacb3f0db8267266cfbe4780df4864cda3
}
