<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;
    protected $casts = ['detalle' => 'array','firmas_acta' => 'array','comprobante' => 'array','firmas_comprobante' => 'array','archivos' => 'array','datos' => 'array'];
}
