<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubObra extends Model
{
    use HasFactory;

    Protected $table= "sub_obras";

    protected $fillable = [
        'proyecto_id',
        'area_id', 
        'tipoEstado_id',
        'cod',
        'nombre',  
        'datos',
    ];

}
