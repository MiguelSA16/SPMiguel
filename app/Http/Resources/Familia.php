<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Familia extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            
            'id'                => $this->id,
            'nomfam'            => $this->nomfam,
            'imagen'            => $this->imagen,
            'grupo'             => $this->grupo,
            'claparent'         => $this->claparent,
            'padre'             => $this->padre,
            'subcategorias'     => $this->categorias,
        ];
    }
}
