<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id'            =>  $this->id,
            'cliente_id'    =>  $this->cliente_id,
            'tipoEstado_id' =>  $this->tipoEstado_id,
            'cod'           =>  $this->cod,
            'nombre'        =>  $this->nombre,
            'datos'         =>  $this->datos,
        ];
    }
}
