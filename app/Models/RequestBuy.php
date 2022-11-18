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
        'created_at',
        'updated_at',
    ];
    protected $casts = ['detail' => 'array','data' => 'array'];
}
