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

    public function project(){
        return $this->hasOne(Proyecto::class, 'cliente_id', 'id');
    }
}
