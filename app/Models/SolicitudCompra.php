<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCompra extends Model
{
    use HasFactory;
    // protected $dates = ['fecha_pago'];
    protected $casts = ['detalle' => 'array'];
}
