<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;
<<<<<<< HEAD:app/Models/TipoEstado.php

    protected $fillable = [
        'id',
        'code',
        'name', 
        'type',   
    ];
    protected $casts = ['datos' => 'array'];
=======
    protected $casts = ['data' => 'array'];
>>>>>>> 14c3a9dacb3f0db8267266cfbe4780df4864cda3:app/Models/Management.php
}
