<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    public function empresa(){
        return $this->hasOne(Empresa::class, 'id');
    }
    protected $casts = ['data' => 'array'];
}
