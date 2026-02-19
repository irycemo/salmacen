<?php

namespace App\Livewire\Almacen;

use App\Models\ArticuloDisponible;
use App\Traits\ComponentesTrait;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AlmacenGeneral extends Component
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

            $this->dispatch('mostrarMensaje', ['success', "La información se guardo con éxito."]);

            $this->modal = false;

        } catch (\Throwable $th) {

            Log::error("Error al actualizar alerta por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error',  $th->getMessage()]);
            $this->resetearTodo();

        }

    }

    #[Computed]
    public function articulos(){

        return ArticuloDisponible::select('id', 'stock_total', 'alerta', 'articulo_id', 'created_at', 'updated_at')
                                    ->where('ubicacion', 'general')
                                    ->withWhereHas('articulo', function($q){
                                        $q->select('id', 'nombre', 'marca', 'serial', 'descripcion')
                                            ->where('nombre', 'LIKE', '%' . $this->search . '%')
                                            ->orWhere('marca', 'LIKE', '%' . $this->search . '%')
                                            ->orWhere('serial', 'LIKE', '%' . $this->search . '%');
                                    })
                                    ->orderBy($this->sort, $this->direction)
                                    ->paginate($this->pagination);

    }

    public function render()
    {
        return view('livewire.almacen.almacen-general')->extends('layouts.admin');
    }

}
