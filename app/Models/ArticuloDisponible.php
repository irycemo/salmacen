<?php

namespace App\Models;

use App\Models\Articulo;
use App\Models\Solicitud;
use App\Models\PrecioStock;
use Illuminate\Database\Eloquent\Model;

class ArticuloDisponible extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }

    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }

    public function precioStock(){
        return $this->hasMany(PrecioStock::class);
    }

}
