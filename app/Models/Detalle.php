<?php

namespace App\Models;

use App\Models\PSD;
use App\Models\Articulo;
use App\Models\Solicitud;
use App\Models\ArticuloDisponible;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function solicitud(){
        return $this->belongsTo(Solicitud::class);
    }

    public function articuloDisponible(){
        return $this->belongsTo(ArticuloDisponible::class, 'articulo_disponible_id');
    }

    public function articulo(){
        return $this->hasOneThrough(Articulo::class, ArticuloDisponible::class,'articulo_id', 'id');
    }

    public function psds(){
        return $this->hasMany(PSD::class);
    }

}
