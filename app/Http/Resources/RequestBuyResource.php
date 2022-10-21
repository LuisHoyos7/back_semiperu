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
            'id'             => $this->id,
            'subObra_id'     => $this->subObra_id,
            'proveedor_id'   => $this->proveedor_id,
            'encargado_id'   => $this->encargado_id,
            'tipoMoneda_id'  => $this->tipoMoneda_id,
            'tipoEstado_id'  => $this->tipoEstado_id,
            'cod'            => $this->cod,
            'nombre'         => $this->nombre,
            'formaPago'      => $this->formaPago,
            'terminoPago'    => $this->terminoPago,
            'detalle'        => $this->detalle,
            'datos'          => $this->datos
        ];
    }
}
