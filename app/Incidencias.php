<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\VarDumper\Dumper\esc;

class Incidencias extends Model
{
    protected $fillable = [
        'id',
        'users_id',
        'referencia',
        'n_serie',
        'n_unidades',
        'nom_cliente',
        'fallo',
        'tipo',
        'fecha_aceptacion',
        'fecha_limite',
        'prioridad',
        'realizado_por',
        'enviado_a',
        'descripcion',
        'observaciones',
        'a_con',
        'f_acon',
        'acon_ana',
        'acon_com',
        'a_corr',
        'f_acorr',
        'acorr_ana',
        'acorr_com',
        'fecha',
        'created_at',
        'updated_at',
        'cliente_id',
        'imagen1',
        'imagen2',
        'imagen3',
        'nombreArticulo'
    ];


    
    public function scopePrioridad($query, $prioridad){
        if($prioridad){
            return  $query->where('prioridad', $prioridad);
        }
    }
    public function scopeCliente($query, $cliente_id){
        if($cliente_id){
            return  $query->where('cliente_id', $cliente_id);
        } 
    }  
    public function scopeSolucionado($query, $solucionado){
        if($solucionado == 'pendiente'){
            return  $query->where('realizado_por', $solucionado);
        }
        elseif($solucionado == 'solucionado'){
            return  $query->where('realizado_por','!=', 'pendiente');
        }
        else{
            return $query;
        }
        
        
        
            
    }
    
  
    
}
