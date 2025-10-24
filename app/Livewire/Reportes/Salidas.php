<?php

namespace App\Livewire\Reportes;

use App\Models\Detalle;
use Livewire\Component;
use App\Models\Articulo;
use Livewire\WithPagination;
use App\Exports\SalidasExport;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Salidas extends Component
{

    use WithPagination;

    public $fecha1;
    public $fecha2;

    public $articulos;
    public $articulo_id;
    public $almacenes;
    public $almacen;

    public $pagination = 10;

    public function descargarExcel(){

        try {

            return Excel::download(new SalidasExport($this->articulo_id, $this->almacen, $this->fecha1, $this->fecha2), 'Reporte_de_salidas_' . now()->format('d-m-Y') . '.xlsx');

        } catch (\Throwable $th) {

            Log::error("Error generar archivo de reporte de salidas por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);

            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);

        }

    }

    public function mount(){

        $this->articulos = Articulo::orderBy('nombre')->get();

    }

    #[Computed]
    public function salidas(){

        return Detalle::with('solicitud', 'articuloDisponible.articulo')
                        ->when($this->articulo_id, function($q){
                            $q->whereHas('articuloDisponible', function($q){
                                $q->where('articulo_id', $this->articulo_id);
                            });
                        })
                        ->when($this->almacen, function($q){
                            $q->whereHas('solicitud', function($q){
                                $q->where('ubicacion', $this->almacen);
                            });
                        })
                        ->whereBetween('created_at', [$this->fecha1 . ' 00:00:00', $this->fecha2 . ' 23:59:59'])
                        ->paginate($this->pagination);

    }

    public function render()
    {
        return view('livewire.reportes.salidas');
    }
}
