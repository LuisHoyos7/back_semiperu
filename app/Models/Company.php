<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
<<<<<<< HEAD:app/Models/Empresa.php

    Protected $table= "empresas";

    protected $fillable = [
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
    protected $casts = ['gerencias' => 'array','areas' => 'array','sedes' => 'array','datos' => 'array'];
=======
    protected $casts = ['managements' => 'array','areas' => 'array','sites' => 'array','data' => 'array'];
>>>>>>> 14c3a9dacb3f0db8267266cfbe4780df4864cda3:app/Models/Company.php
}
