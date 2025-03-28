<?php

namespace App\Models;

use App\Models\Articulo;
use App\Traits\ModelosTrait;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

    use ModelosTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }

}
