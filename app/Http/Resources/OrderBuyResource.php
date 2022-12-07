<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderBuyResource extends JsonResource
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
            'request_buy_id'        => $this->request_buy_id,
            'state_type'            => StateTypeResource::make($this->states),
            'code'                  => $this->code,
            'name'                  => $this->name,
            'detail'                => $this->detail,
            'firms'                 => $this->firms,
            'files'                 => $this->files,
            'data'                  => $this->data,
            'created_at'            => $this->created_at->format('Y-m-d H:i:s'),
            'year_order'            => $this->created_at->format('Y'),
            'history'               => $this->history
        ];
    }
}
