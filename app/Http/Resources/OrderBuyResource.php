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
            'solicitudCompra_id'    => $this->solicitudCompra_id,
            'tipoEstado_id'         => $this->tipoEstado_id,
            'cod'                   => $this->cod,
            'nombre'                => $this->nombre,
            'detalle'               => $this->detalle,
            'firmas'                => $this->firmas,
            'archivos'              => $this->archivos,
            'datos'                 => $this->datos,
            'created_at'            => $this->created_at->format('Y-m-d H:i:s' )
        ];
    }
}
