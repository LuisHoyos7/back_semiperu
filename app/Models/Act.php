<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    use HasFactory;

    public function orderBuy(){
        return $this->belongsTo(OrderBuy::class, 'order_buy_id', 'id');
    }

    public function sumOrderBuyId($id){

        $orders_buy = orderBuy::where('id',$id)->get();
        $sumOrderBuyId = 0;
        foreach($orders_buy as $order_buy){
            foreach($order_buy->detail as $detail){
                $sumOrderBuyId =  $detail['price'] * $detail['amount'] + $sumOrderBuyId ;
            }
        }
        return $sumOrderBuyId;
    }

    protected $casts = ['detail' => 'array','files' => 'array','firms' => 'array','voucher' => 'array','data' => 'array'];
}
