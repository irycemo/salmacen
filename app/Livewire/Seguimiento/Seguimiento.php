<?php

namespace App\Livewire\Seguimiento;

use App\Models\Entrada;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\Solicitud;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Models\ArticuloDisponible;

class Seguimiento extends Component
{

    use WithPagination;

    public $articulo;
    public $articuloSeleccionado;

    public $articuloDisponibleGeneral;
    public $articuloDisponibleCatastro;
    public $articuloDisponibleRpp;

    public $entradas;

    public $solicitudes;

    public function updatingArticulo():void
    {
        $this->resetPage();
    }

    public function seleccionarArticulo(Articulo $articulo){

        $this->articuloSeleccionado = $articulo;

        $this->articuloDisponibleGeneral = ArticuloDisponible::where('articulo_id', $this->articuloSeleccionado->id)
                                                    ->where('ubicacion', 'general')
                                                    ->first();

        $this->articuloDisponibleCatastro = ArticuloDisponible::where('articulo_id', $this->articuloSeleccionado->id)
                                                    ->where('ubicacion', 'catastro')
                                                    ->first();

        $this->articuloDisponibleRpp = ArticuloDisponible::where('articulo_id', $this->articuloSeleccionado->id)
                                                    ->where('ubicacion', 'rpp')
                                                    ->first();

        $this->entradas = Entrada::with('creadoPor:id,name')
                                    ->where('articulo_id', $this->articuloSeleccionado->id)
                                    ->get();

        $this->solicitudes = Solicitud::with('creadoPor:id,name')
                                        ->withWhereHas('detalles', function($q){
                                            $q->when($this->articuloDisponibleGeneral, function($q){
                                                    $q->where('articulo_disponible_id', $this->articuloDisponibleGeneral->id);
                                                })
                                                ->when($this->articuloDisponibleCatastro, function($q){
                                                    $q->orWhere('articulo_disponible_id', $this->articuloDisponibleCatastro->id);
                                                })->when($this->articuloDisponibleRpp, function($q){
                                                    $q->orWhere('articulo_disponible_id', $this->articuloDisponibleRpp->id);
                                                });
                                        })
                                        ->withSum('detalles', 'cantidad')
                                        ->get();

    }

    #[Computed]
    public function articulos(){

        return Articulo::select('id', 'nombre', 'marca')
                            ->where('nombre', 'LIKE', '%' . $this->articulo . '%')
                            ->orWhere('marca', 'LIKE', '%' . $this->articulo . '%')
                            ->simplePaginate(5);

    }

    public function render()
    {
        return view('livewire.seguimiento.seguimiento')->extends('layouts.admin');
    }
}
