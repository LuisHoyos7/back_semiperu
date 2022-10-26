<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCompra extends Model
{
    use HasFactory;
    
    Protected $table= "solicitud_compras";

    protected $fillable = [
        'subObra_id',
        'proveedor_id',
        'encargado_id', 
        'tipoMoneda_id',
        'tipoEstado_id',
        'cod',  
        'nombre',
        'formaPago',
        'terminoPago',
        'detalle',
        'datos',
    ];
    
    protected $casts = ['detalle' => 'array','datos' => 'array'];
}
