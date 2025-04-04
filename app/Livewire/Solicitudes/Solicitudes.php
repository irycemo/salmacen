<?php

namespace App\Livewire\Solicitudes;

use Livewire\Component;
use App\Models\Solicitud;
use App\Models\PrecioStock;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Traits\ComponentesTrait;
use App\Models\ArticuloDisponible;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Solicitudes extends Component
{

    use WithPagination;
    use ComponentesTrait;

    public Solicitud $modelo_editar;

    public $modalVer;

    public $comentario;

    protected $queryString = ['search'];

    protected $validationAttributes  = [
        'modelo_editar.nadescripcionme' => 'descripción',
        'precio_unidad' => 'precio por unidad'
    ];

    public function crearModeloVacio(){
        $this->modelo_editar = Solicitud::make();
    }

    public function abrirModalVer(Solicitud $solicitud){

        $this->modelo_editar = $solicitud;

        $this->modelo_editar->load('detalles.articuloDisponible.articulo.creadoPor');

        $this->modalVer = true;

    }

    public function aceptar(){

        try {

            $this->modelo_editar->update([
                'estado' => 'aceptado',
                'actualizado_por' => auth()->id()
            ]);

            $this->dispatch('mostrarMensaje', ['success', "La solicitud se aceptó con éxito."]);

            $this->resetearTodo();

        } catch (\Throwable $th) {
            Log::error("Error al aceptar solicitud por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();
        }

    }

    public function entregar(){

        try {

            if($this->modelo_editar->creadoPor->hasRole('Director')){

                DB::transaction(function () {

                    $this->procesarSolicitudDirector();

                    $this->modelo_editar->update([
                        'estado' => 'entregado',
                        'actualizado_por' => auth()->id()
                    ]);

                });

                $this->dispatch('mostrarMensaje', ['success', "La solicitud se entregó con éxito, al almacen del solicitante fue actualizado."]);

            }else{

                $this->modelo_editar->update([
                    'estado' => 'entregado',
                    'actualizado_por' => auth()->id()
                ]);

                $this->dispatch('mostrarMensaje', ['success', "La solicitud se entregó con éxito."]);

            }

            $this->resetearTodo();

            return response()->streamDownload(
                fn () => print($this->construirPdf()->output()),
                'solicitud- ' . $this->modelo_editar->folio . '.pdf'
            );

        } catch (\Throwable $th) {
            Log::error("Error al entregar solicitud por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();
        }

    }

    public function rechazar(){

        $this->validate(['comentario' => 'required']);

        try {

            $this->modelo_editar->load('detalles.psds.precioStock');

            DB::transaction(function () {

                $this->modelo_editar->update([
                    'estado' => 'rechazado',
                    'comentario' => $this->comentario,
                    'actualizado_por' => auth()->id()
                ]);

                foreach ($this->modelo_editar->detalles as $detalle) {

                    foreach ($detalle->psds as $psd) {

                        $psd->precioStock->increment('stock', $psd->cantidad);

                        $psd->delete();

                    }

                    $stock_total = PrecioStock::where('articulo_disponible_id', $detalle->articulo_disponible_id)->sum('stock');

                    $detalle->articuloDisponible->update(['stock_total' => $stock_total]);

                }

            });

            $this->resetearTodo($borrado = true);

            $this->dispatch('mostrarMensaje', ['success', "La solicitud se rechazó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al rechazar solicitud por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function procesarSolicitudDirector(){

        foreach ($this->modelo_editar->detalles as $detalle) {

            $articuloDisponible = ArticuloDisponible::when($this->modelo_editar->creadoPor->area == 'Dirección de Catastro',function($q){
                                                            $q->where('ubicacion', 'Catastro');
                                                        })
                                                        ->when($this->modelo_editar->creadoPor->area == 'Dirección del Registro Público de la Propiedad',function($q){
                                                            $q->where('ubicacion', 'RPP');
                                                        })
                                                        ->where('articulo_id', $detalle->articuloDisponible->articulo_id)
                                                        ->first();

            if($articuloDisponible){

                $articuloDisponible->increment('stock_total', $detalle->cantidad);

                PrecioStock::create([
                    'articulo_disponible_id' => $articuloDisponible->id,
                    'stock' => $detalle->cantidad,
                    'precio' => $detalle->precio / $detalle->cantidad
                ]);

            }else{

                ArticuloDisponible::create([
                    'articulo_id' => $detalle->articuloDisponible->articulo_id,
                    'stock_total' => $detalle->cantidad,
                    'ubicacion' => $this->modelo_editar->creadoPor->area == 'Dirección de Catastro' ? 'Catastro' : 'RPP'
                ]);

                PrecioStock::create([
                    'articulo_disponible_id' => $articuloDisponible->id,
                    'stock' => $detalle->cantidad,
                    'precio' => $detalle->precio / $detalle->cantidad
                ]);

            }

        }

    }

    public function construirPdf(){

        $this->modelo_editar->load('detalles.articuloDisponible.articulo');

        $pdf = Pdf::loadView('recibo.recibo', [
            'solicitud' => $this->modelo_editar,
        ]);

        $pdf->render();

        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf->get_canvas();

        $canvas->page_text(480, 745, "Página: {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(1, 1, 1));

        $canvas->page_text(35, 745, 'Solicitud: ' . $this->modelo_editar->folio, null, 9, array(1, 1, 1));

        return $pdf;
    }

    public function reimprimir(Solicitud $solicitud){

        $this->modelo_editar = $solicitud;

        return response()->streamDownload(
            fn () => print($this->construirPdf()->output()),
            'solicitud- ' . $this->modelo_editar->folio . '.pdf'
        );

    }

    public function borrar(){

        try{

            $solicitud = Solicitud::with('detalles.psds.precioStock')->find($this->selected_id);

            DB::transaction(function () use($solicitud){

                foreach ($solicitud->detalles as $detalle) {

                    foreach ($detalle->psds as $psd) {

                        $psd->precioStock->increment('stock', $psd->cantidad);

                        $psd->delete();

                    }

                    $stock_total = PrecioStock::where('articulo_disponible_id', $detalle->articulo_disponible_id)->sum('stock');

                    $detalle->articuloDisponible->update(['stock_total' => $stock_total]);

                    $detalle->delete();

                }

                $solicitud->delete();

            });

            $this->resetearTodo($borrado = true);

            $this->dispatch('mostrarMensaje', ['success', "La solicitud se eliminó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al borrar solicitud por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function render()
    {

        $solicitudes = Solicitud::with('creadoPor', 'actualizadoPor')
                                ->when(
                                    auth()->user()->hasRole(['Solicitante', 'Director']),
                                    function($q){
                                        $q->where('creado_por', auth()->id());
                                    }
                                )
                                ->where('estado', 'LIKE', '%' . $this->search . '%')
                                ->withSum('detalles', 'cantidad')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->pagination);

        return view('livewire.solicitudes.solicitudes', compact('solicitudes'))->extends('layouts.admin');
    }
}
;