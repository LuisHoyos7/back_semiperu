<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    use HasFactory;

    public function states(){
        return $this->belongsTo(StateType::class, 'state_type_id', 'id');
    }

    protected $casts = ['detail' => 'array','files' => 'array','firms' => 'array','data' => 'array'];
}
