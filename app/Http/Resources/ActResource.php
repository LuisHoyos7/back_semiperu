<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ActResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'order_buy_id'  => $this->order_buy_id,
            'state_type_id' => $this->state_type_id,
            'code'          => $this->code,
            'name'          => $this->name,
            'detail'        => $this->detail,
            'files'         => $this->files,
            'firms'         => $this->firms,
            'voucher'       => $this->voucher,
            'date'          => $this->data,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
            'order_buy'     => OrderBuyResource::make($this->orderBuy),
            'sumOrderBuyId'        => $this->sumOrderBuyId($this->order_buy_id),
        ];
    }
}
