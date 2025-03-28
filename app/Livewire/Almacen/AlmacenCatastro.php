<?php

namespace App\Livewire\Almacen;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\ComponentesTrait;
use App\Models\ArticuloDisponible;
use Illuminate\Support\Facades\Log;

class AlmacenCatastro extends Component
{

    use WithPagination;
    use ComponentesTrait;

    public ArticuloDisponible $modelo_editar;

    protected function rules(){
        return [
            'modelo_editar.alerta' => 'required'
         ];
    }

    public function crearModeloVacio(){
        $this->modelo_editar =  ArticuloDisponible::make();
    }

    public function abrirModalAlerta(ArticuloDisponible $articulo){

        $this->modelo_editar = $articulo;

        $this->modal = true;

    }

    public function actualizar(){

        $this->validate();

        try {

            $this->modelo_editar->save();

            $this->dispatch('mostrarMensaje', ['success', "La información se guardó con éxito."]);

            $this->modal = false;

        } catch (\Throwable $th) {

            Log::error("Error al actualizar alerta por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error',  $th->getMessage()]);
            $this->resetearTodo();

        }

    }

    public function render()
    {

        $articulos = ArticuloDisponible::where('ubicacion', 'catastro')
                                        ->withWhereHas('articulo', function($q){
                                            $q->where('nombre', 'LIKE', '%' . $this->search . '%')
                                                ->orWhere('marca', 'LIKE', '%' . $this->search . '%')
                                                ->orWhere('serial', 'LIKE', '%' . $this->search . '%');
                                        })
                                        ->orderBy($this->sort, $this->direction)
                                        ->paginate($this->pagination);

        return view('livewire.almacen.almacen-catastro', compact('articulos'))->extends('layouts.admin');

    }

}
