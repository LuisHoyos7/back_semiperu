<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestBuyResource extends JsonResource
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
            'id'                    => $this->id,
            'company_id'            => $this->company_id,
            'user_id'               => $this->user_id,
            'currency_type_id'      => $this->currency_type_id,
            'state_type'            => StateTypeResource::make($this->states),
            'code'                  => $this->code,
            'name'                  => $this->name,
            'payment_method'        => $this->payment_method,
            'payment_term'          => $this->payment_term,
            'detail'                => $this->detail,
            'data'                  => $this->data,
            'created_at'            => $this->created_at->format('Y-m-d H:i:s'),
            'year_order'            => $this->created_at->format('Y'),
            'history'               => $this->history
        ];
    }
}
