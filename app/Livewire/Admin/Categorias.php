<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;
use App\Traits\ComponentesTrait;
use Illuminate\Support\Facades\Log;

class Categorias extends Component
{

    use WithPagination;
    use ComponentesTrait;

    public $areas = [];

    public Categoria $modelo_editar;

    protected function rules(){
        return [
            'modelo_editar.nombre' => 'required'
         ];
    }

    public function crearModeloVacio(){
        $this->modelo_editar = Categoria::make();
    }

    public function abrirModalEditar(Categoria $modelo){

        $this->resetearTodo();
        $this->modal = true;
        $this->editar = true;

        if($this->modelo_editar->isNot($modelo))
            $this->modelo_editar = $modelo;

    }

    public function guardar(){

        $this->validate();

        try {

            $this->modelo_editar->creado_por = auth()->user()->id;
            $this->modelo_editar->save();

            $this->resetearTodo();

            $this->dispatch('mostrarMensaje', ['success', "La categoría se creó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al crear categoría por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function actualizar(){

        $this->validate();

        try{

            $this->modelo_editar->actualizado_por = auth()->user()->id;
            $this->modelo_editar->save();

            $this->resetearTodo();

            $this->dispatch('mostrarMensaje', ['success', "La categoría se actualizó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al actualizar categoría por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function borrar(){

        try{

            $categoria = Categoria::find($this->selected_id);

            $categoria->delete();

            $this->resetearTodo($borrado = true);

            $this->dispatch('mostrarMensaje', ['success', "La categoría se eliminó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al borrar categoría por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function render()
    {

        $categorias = Categoria::with('creadoPor', 'actualizadoPor')
                                ->where('nombre', 'LIKE', '%' . $this->search . '%')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->pagination);

        return view('livewire.admin.categorias', compact('categorias'))->extends('layouts.admin');
    }

}
