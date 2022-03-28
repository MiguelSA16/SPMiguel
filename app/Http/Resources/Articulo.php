<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Articulo extends JsonResource
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

            'id'            => $this->id,
            'nombre'        => $this->nombre,
            'codigo'        => $this->codigo,
            'refprov'       => $this->refprov, 
            'familia'       => $this->familia->nomfam,
            'imagen'       => $this->imagen,
            'pdf'           => $this->pdf,
            'color'         => $this->color,
            'longitud'      => $this->longitud,

            'pvp1'          => $this->pvp1,
            'pvp1iva'       => $this->pvp1iva,
            'pvp2'          => $this->pvp2,
            'pvp2iva'       => $this->pvp2iva,


            
            'ancho'         => $this->ancho,
            
            'descripcion'   => $this->descripcion,
            'familia_id'    => $this->familia_id,
            'grupo'         => $this->grupo,
            'baja_web'      => $this->baja_web,
               
            'stock'         => $this->stock[0]->total
        ];
    }
}
