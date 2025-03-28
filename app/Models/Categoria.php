<?php

namespace App\Models;

use App\Models\Articulo;
use App\Traits\ModelosTrait;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use ModelosTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function articulos(){
        return $this->hasMany(Articulo::class);
    }
}
