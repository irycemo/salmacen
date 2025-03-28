<?php

namespace App\Models;

use App\Models\Entrada;
use App\Models\Categoria;
use App\Traits\ModelosTrait;
use App\Models\ArticuloDisponible;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{

    use ModelosTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }

    public function articulosDisponibles(){
        return $this->hasMany(ArticuloDisponible::class);
    }

}
