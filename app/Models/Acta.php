<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;
    protected $casts = ['detalle' => 'array','archivos' => 'array','firmas' => 'array','comprobante' => 'array','datos' => 'array'];
}
