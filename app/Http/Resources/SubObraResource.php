<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubObraResource extends JsonResource
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
            'proyecto_id'   => $this->proyecto_id,
            'area_id'       => $this->area_id,
            'tipoEstado_id' => $this->tipoEstado_id,
            'cod'           => $this->cod,
            'nombre'        => $this->nombre,
            'datos'         => $this->datos
        ];
    }
}
