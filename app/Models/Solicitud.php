<?php

namespace App\Models;

use App\Models\Detalle;
use App\Traits\ModelosTrait;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{

    use ModelosTrait;

    public function getEstadoColorAttribute()
    {
        return [
            'nuevo' => 'blue-400',
            'rechazado' => 'red-400',
            'aceptado' => 'green-400',
        ][$this->estado] ?? 'gray-400';
    }

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function detalles(){
        return $this->hasMany(Detalle::class);
    }

}
