<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail',
        'request_buy_id',
        'state_type_id', 
        'code', 
        'name',
        'history',
        'firms',
        'files',
        'data'
    ];

    public function states(){
        return $this->belongsTo(StateType::class, 'state_type_id', 'id');
    }

    protected $casts = ['detail' => 'array','files' => 'array','firms' => 'array','data' => 'array', 'history' => 'array'];
}
