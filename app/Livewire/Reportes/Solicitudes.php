<?php

namespace App\Livewire\Reportes;

use App\Models\User;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\Solicitud;
use Livewire\WithPagination;
use App\Constantes\Constantes;
use App\Exports\SolicitudesExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Solicitudes extends Component
{

    use WithPagination;

    public $fecha1;
    public $fecha2;

    public $usuarios;
    public $usuario;
    public $ubicaciones;
    public $ubicacion;
    public $articulos;
    public $articulo;
    public $estado;

    public $pagination = 10;

    public function descargarExcel(){

        try {

            return Excel::download(new SolicitudesExport($this->usuario, $this->ubicacion, $this->articulo, $this->estado, $this->fecha1, $this->fecha2), 'Reporte_de_solicitudes_' . now()->format('d-m-Y') . '.xlsx');

        } catch (\Throwable $th) {

            Log::error("Error generar archivo de reporte de solicitudes por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);

            $this->dispatchBrowserEvent('mostrarMensaje', ['error', "Ha ocurrido un error."]);

        }

    }

    public function mount(){

        $this->articulos = Articulo::orderBy('nombre')->get();

        $this->usuarios = User::orderBy('name')->get();

        $this->ubicaciones = Constantes::UBICACIONES;

    }

    public function render()
    {

        $solicitudes = Solicitud::withSum('detalles', 'cantidad')
                                    ->when(isset($this->usuario), function ($q){
                                        $q->where('creado_por', $this->usuario);
                                    })
                                    ->when(isset($this->ubicacion), function ($q){
                                        $q->where('ubicacion', $this->ubicacion);
                                    })
                                    ->when(isset($this->articulo), function ($q){
                                        $q->whereHas('detalle',function($q){
                                            $q->whereHas('articuloDisponible', function($q){
                                                $q->where('articulo_id', $this->articulo);
                                            });
                                        });
                                    })
                                    ->when(isset($this->estado), function ($q){
                                        $q->where('estado', $this->estado);
                                    })
                                    ->whereBetween('created_at', [$this->fecha1 . ' 00:00:00', $this->fecha2 . ' 23:59:59'])
                                    ->paginate($this->pagination);


        return view('livewire.reportes.solicitudes', compact('solicitudes'));
    }
}
