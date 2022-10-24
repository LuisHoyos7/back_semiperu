<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    Protected $table= "empresas";

    protected $fillable = [
        'id',
        'tipoDocumento_id',
        'tipoEstado_id',
        'cod',
        'nombre',
        'gerencias',
        'areas',
        'sedes',
        'datos',
    ];
    protected $casts = ['gerencias' => 'array','areas' => 'array','sedes' => 'array','datos' => 'array'];
}
