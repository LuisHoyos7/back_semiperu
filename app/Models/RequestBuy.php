<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBuy extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'currency_type_id',
        'state_type_id',
        'code',
        'name',
        'payment_method',
        'payment_term',
        'detail',
        'data',
        'history',
        'firms',
        'created_at' ,
        'updated_at',
    ];

    public function states(){
        return $this->belongsTo(StateType::class, 'state_type_id', 'id');
    }

    public function histoies(){
        return $this->belongsTo(RequestBuyHistory::class);
    }

    protected $casts = ['detail' => 'array','data' => 'array', 'history' => 'array', 'firms' => 'array'];
}
