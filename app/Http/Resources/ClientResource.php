<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'tipoDocumento_id' => $this->tipoDocumento_id,
            'tipoEstado_id'    => $this->tipoEstado_id,
            'cod'              => $this->cod,
            'nombre'           => $this->nombre,
            'gerencias'        => $this->gerencias,
            'areas'            => $this->areas,
            'sedes'            => $this->sedes,
            'datos'            => $this->datos
        ];
    }
}
