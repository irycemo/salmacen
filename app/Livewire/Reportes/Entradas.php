<?php

namespace App\Livewire\Reportes;

use App\Models\Entrada;
use Livewire\Component;
use App\Models\Articulo;
use Livewire\WithPagination;
use App\Exports\EntradasExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Entradas extends Component
{

    use WithPagination;

    public $fecha1;
    public $fecha2;

    public $articulos;
    public $articulo;

    public $pagination = 10;

    public function descargarExcel(){

        try {

            return Excel::download(new EntradasExport($this->articulo, $this->fecha1, $this->fecha2), 'Reporte_de_entradas_' . now()->format('d-m-Y') . '.xlsx');

        } catch (\Throwable $th) {

            Log::error("Error generar archivo de reporte de entradas por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);

            $this->dispatchBrowserEvent('mostrarMensaje', ['error', "Ha ocurrido un error."]);

        }

    }

    public function mount(){

        $this->articulos = Articulo::orderBy('nombre')->get();

    }

    public function render()
    {

        $entradas = Entrada::with('articulo:id,nombre,marca')
                                ->when(isset($this->articulo), function($q){
                                    $q->where('articulo_id', $this->articulo);
                                })
                                ->whereBetween('created_at', [$this->fecha1 . ' 00:00:00', $this->fecha2 . ' 23:59:59'])
                                ->paginate($this->pagination);


        return view('livewire.reportes.entradas', compact('entradas'));
    }
}
