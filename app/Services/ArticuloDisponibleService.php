<?php

namespace App\Services;

use App\Models\PrecioStock;
use App\Models\ArticuloDisponible;
use App\Exceptions\GeneralExpection;

class ArticuloDisponibleService
{

    public function crear(int $articuloId, int $entradaId, int $cantidad, float $precioPorUnidad):void
    {

        $articuloDisponible = ArticuloDisponible::where('articulo_id', $articuloId)
                                                    ->where('ubicacion', 'general')
                                                    ->first();

        if($articuloDisponible){

            if($articuloDisponible->articulo->serial) throw new GeneralExpection('El artículo con el número de serie: ' . $articuloDisponible->articulo->serial . ' ya tiene una entrada.');

            PrecioStock::create([
                                    'articulo_disponible_id' => $articuloDisponible->id,
                                    'entrada_id' => $entradaId,
                                    'stock' => $cantidad,
                                    'precio' => $precioPorUnidad
                                ]);

            $stock_total = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)->sum('stock');

            $articuloDisponible->update(['stock_total' => $stock_total]);

        }else{

            $articuloDisponible = ArticuloDisponible::create([
                                                                'articulo_id' => $articuloId,
                                                                'ubicacion' => 'general',
                                                                'stock_total' => $cantidad
                                                            ]);

            PrecioStock::create([
                                    'articulo_disponible_id' => $articuloDisponible->id,
                                    'entrada_id' => $entradaId,
                                    'stock' => $cantidad,
                                    'precio' => $precioPorUnidad
                                ]);

        }

    }

}
