<?php

namespace App\Livewire\Articulos;

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Categoria;
use Livewire\WithPagination;
use App\Traits\ComponentesTrait;
use Illuminate\Support\Facades\Log;

class Articulos extends Component
{

    use WithPagination;
    use ComponentesTrait;

    public $categorias;

    public Articulo $modelo_editar;

    protected function rules(){
        return [
            'modelo_editar.nombre' => 'required',
            'modelo_editar.categoria_id' => 'required',
            'modelo_editar.marca' => 'nullable',
            'modelo_editar.serial' => 'nullable',
            'modelo_editar.descripcion' => 'required',
         ];
    }

    protected $validationAttributes  = [
        'modelo_editar.categoria_id' => 'categoría',
        'modelo_editar.descripcion' => 'descripción',
        'modelo_editar.serial' => 'número de serie',
    ];

    public function crearModeloVacio(){
        $this->modelo_editar = Articulo::make([
            'marca' => 'S/M'
        ]);
    }

    public function abrirModalEditar(Articulo $modelo){

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

            $this->dispatch('mostrarMensaje', ['success', "El artículo se creó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al crear artículo por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
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

            $this->dispatch('mostrarMensaje', ['success', "El artículo se actualizó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al actualizar artículo por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function borrar(){

        try{

            $articulo = Articulo::find($this->selected_id);

            $articulo->delete();

            $this->resetearTodo($borrado = true);

            $this->dispatch('mostrarMensaje', ['success', "El artículo se eliminó con éxito."]);

        } catch (\Throwable $th) {

            Log::error("Error al borrar artículo por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function mount(){

        $this->crearModeloVacio();

        $this->categorias = Categoria::all();

    }

    public function render()
    {

        $articulos = Articulo::with('creadoPor', 'actualizadoPor')
                                ->where('nombre', 'LIKE', '%' . $this->search . '%')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->pagination);

        return view('livewire.articulos.articulos', compact('articulos'))->extends('layouts.admin');
    }

}
