<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    Protected $table= "proyectos";

    protected $fillable = [
        'cliente_id',
        'tipoEstado_id', 
        'cod',
        'nombre',
        'datos',
    ];

    public function empresa(){
        return $this->hasOne(Empresa::class, 'id');
    }

    
    protected $casts = ['data' => 'array'];
}
