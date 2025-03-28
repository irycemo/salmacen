<?php

namespace App\Models;

use App\Models\Entrada;
use App\Models\ArticuloDisponible;
use Illuminate\Database\Eloquent\Model;

class PrecioStock extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function articulo(){
        return $this->belongsTo(ArticuloDisponible::class, 'articulo_disponible_id');
    }

    public function entrada(){
        return $this->belongsTo(Entrada::class);
    }
}
