<?php

namespace App\Livewire\Solicitudes;

use App\Models\PSD;
use App\Models\Detalle;
use Livewire\Component;
use App\Models\Solicitud;
use App\Models\PrecioStock;
use Livewire\Attributes\Computed;
use App\Models\ArticuloDisponible;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exceptions\GeneralExpection;
use Livewire\WithPagination;

class CrearEditarSolicitud extends Component
{

    use WithPagination;

    public Solicitud $solicitud;

    public $search;

    public function validaciones($articulo, $cantidad){

        if($cantidad < 1) throw new GeneralExpection("La cantidad no puede ser menor a 1.");

        if($articulo->stock_total < $cantidad) throw new GeneralExpection("La cantidad debe ser menor.");

    }

    public function agregar(ArticuloDisponible $articulo, $cantidad){

        try {

            $this->validaciones($articulo, $cantidad);

            DB::transaction(function () use($articulo, $cantidad){

                if(!$this->solicitud->getKey()){

                    $this->solicitud = Solicitud::create([
                        'folio' => (Solicitud::max('folio') ?? 0) + 1,
                        'ubicacion' => auth()->user()->ubicacion,
                        'estado' => 'nuevo',
                        'creado_por' => auth()->id()
                    ]);

                }

                $this->crearDetalle($articulo, (int)$cantidad);

            });

            $this->solicitud->load('detalles.articuloDisponible.articulo');

        } catch (GeneralExpection $ex) {

            $this->dispatch('mostrarMensaje', ['warning', $ex->getMessage()]);

        } catch (\Throwable $th) {

            Log::error("Error al agregar artículos a solicitud por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);

        }

    }

    public function crearDetalle(ArticuloDisponible $articuloDisponible, $cantidad){

        $detalle = Detalle::where('articulo_disponible_id', $articuloDisponible->id)
                            ->where('solicitud_id', $this->solicitud->id)
                            ->first();

        if(!$detalle){

            $detalle = Detalle::create([
                'articulo_disponible_id' => $articuloDisponible->id,
                'solicitud_id' => $this->solicitud->id,
                'cantidad' => $cantidad,
                'precio' => 0
            ]);

        }else{

            $detalle->increment('cantidad', $cantidad);

        }

        $precioStock = $articuloDisponible->precioStock->where('stock', '>', 0)->first();

        while($cantidad > 0){

            if($precioStock->stock < $cantidad){

                $cantidad = $cantidad - $precioStock->stock;

                $this->agregarPsd($precioStock->id, $detalle->id, $precioStock->stock);

                if($precioStock->precio) $detalle->increment('precio', $precioStock->stock * $precioStock->precio);

                $precioStock->update(['stock' => 0]);

                $precioStock = $articuloDisponible->precioStock->where('stock', '>', 0)->first();

                if(!$precioStock) throw new GeneralExpection("No hay suficiente stock");

            }else{

                $this->agregarPsd($precioStock->id, $detalle->id, $cantidad);

                $precioStock->decrement('stock', $cantidad);

                if($precioStock->precio) $detalle->increment('precio', $cantidad * $precioStock->precio);

                $cantidad = 0;

            }

        }

        $stock_total = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)->sum('stock');

        $articuloDisponible->update(['stock_total' => $stock_total]);

        $precioTotal = 0;

        $this->solicitud->load('detalles');

        foreach($this->solicitud->detalles as $detalle){

            $precioTotal += $detalle->precio;

        }

        $this->solicitud->update(['precio' => $precioTotal]);

    }

    public function agregarPsd($precioStockId, $detalleId, $cantidad){

        $psd = PSD::where('precio_stock_id', $precioStockId)
                        ->where('detalle_id', $detalleId)
                        ->first();

        if($psd){

            $psd->increment('cantidad', $cantidad);

        }else{

            PSD::create([
                'precio_stock_id' => $precioStockId,
                'detalle_id' => $detalleId,
                'cantidad' => $cantidad
            ]);

        }

    }

    public function eliminarDetalle(Detalle $detalle){

        $detalle->load('psds.precioStock');

        try {

            DB::transaction(function () use($detalle){

                foreach ($detalle->psds as $psd) {

                    $psd->precioStock->increment('stock', $psd->cantidad);

                    $psd->delete();

                }

                $this->solicitud->load('detalles.articuloDisponible.articulo');

                $precioTotal = 0;

                foreach($this->solicitud->detalles as $detalle){

                    $precioTotal += $detalle->precio;

                }

                $this->solicitud->decrement('precio', $detalle->precio);

                $stock_total = PrecioStock::where('articulo_disponible_id', $detalle->articulo_disponible_id)->sum('stock');

                $detalle->articuloDisponible->update(['stock_total' => $stock_total]);

                $detalle->delete();

            });

            $this->solicitud->load('detalles.articuloDisponible.articulo');

        } catch (\Throwable $th) {

            Log::error("Error al borrar detalle en solicitud por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);

        }

    }

    #[Computed]
    public function articulos(){

        return ArticuloDisponible::when(auth()->user()->ubicacion == 'Catastro', function($q){
                                $q->where('ubicacion', 'catastro');
                            })
                            ->when(auth()->user()->ubicacion == 'General', function($q){
                                $q->where('ubicacion', 'general');
                            })
                            ->when(auth()->user()->ubicacion == 'RPP', function($q){
                                $q->where('ubicacion', 'rpp');
                            })
                            ->where('stock_total', '>', 0)
                            ->withWhereHas('articulo', function($q){
                                $q->select('id' ,'nombre', 'marca')
                                    ->where('nombre', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('marca', 'LIKE', '%' . $this->search . '%');
                            })
                            ->simplePaginate(10);

    }

    public function mount(){

        if(!isset($this->solicitud)){

            $this->solicitud = Solicitud::make();

        }else{

            $this->solicitud->load('detalles.articuloDisponible.articulo');

        }

    }

    public function render()
    {
        return view('livewire.solicitudes.crear-editar-solicitud')->extends('layouts.admin');
    }

}
