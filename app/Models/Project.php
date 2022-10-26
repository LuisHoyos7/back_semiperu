<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
<<<<<<< HEAD:app/Models/Proyecto.php
    
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
    protected $casts = ['datos' => 'array'];
=======
    protected $casts = ['data' => 'array'];
>>>>>>> 14c3a9dacb3f0db8267266cfbe4780df4864cda3:app/Models/Project.php
}
