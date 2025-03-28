<?php

namespace App\Livewire\Reportes;

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Categoria;
use Livewire\WithPagination;
use App\Constantes\Constantes;
use App\Exports\ArticulosExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Articulos extends Component
{

    use WithPagination;

    public $ubicaciones;
    public $ubicacion;
    public $categorias;
    public $categoria;

    public $pagination = 10;

    public function descargarExcel(){

        try {

            return Excel::download(new ArticulosExport($this->categoria, $this->ubicacion), 'Reporte_de_artículos_' . now()->format('d-m-Y') . '.xlsx');

        } catch (\Throwable $th) {

            Log::error("Error generar archivo de reporte de artículos por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);

            $this->dispatchBrowserEvent('mostrarMensaje', ['error', "Ha ocurrido un error."]);

        }

    }

    public function mount(){

        $this->ubicaciones = Constantes::UBICACIONES;

        $this->categorias = Categoria::all();

    }

    public function render()
    {

        $articulos = Articulo::withWhereHas('articulosDisponibles', function($q){
                                    $q->where('ubicacion', $this->ubicacion);
                                })
                                ->where('categoria_id', $this->categoria)
                                ->paginate($this->pagination);

        return view('livewire.reportes.articulos', compact('articulos'));
    }
}
