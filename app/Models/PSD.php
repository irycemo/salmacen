<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PSD extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function precioStock(){
        return $this->belongsTo(PrecioStock::class);
    }

    public function detalle(){
        return $this->belongsTo(Detalle::class);
    }

}
