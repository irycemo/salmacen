<?php

namespace App\Livewire\Entradas;

use App\Exceptions\GeneralExpection;
use App\Models\Entrada;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\PrecioStock;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Traits\ComponentesTrait;
use Livewire\Attributes\Computed;
use App\Models\ArticuloDisponible;
use App\Models\PSD;
use App\Services\ArticuloDisponibleService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Entradas extends Component
{

    use WithPagination;
    use ComponentesTrait;

    public Entrada $modelo_editar;

    public $articulo;
    public $articuloSeleccionado;

    public $precio_unidad;

    protected function rules(){
        return [
            'modelo_editar.origen' => 'required',
            'modelo_editar.cantidad' => [
                                            'required',
                                            Rule::when($this->articuloSeleccionado?->serial, ['max:1', 'integer'])
                                        ],
            'modelo_editar.descripcion' => 'required',
            'precio_unidad' => Rule::requiredIf($this->modelo_editar->origen == 'compra')
         ];
    }

    protected $validationAttributes  = [
        'modelo_editar.descripcion' => 'descripción',
        'precio_unidad' => 'precio por unidad'
    ];

    public function crearModeloVacio(){
        $this->modelo_editar = Entrada::make();
    }

    #[Computed]
    public function articulos(){

        return Articulo::select('id', 'nombre', 'marca')
                            ->where('nombre', 'LIKE', '%' . $this->articulo . '%')
                            ->orWhere('marca', 'LIKE', '%' . $this->articulo . '%')
                            ->simplePaginate(5);

    }

    public function seleccionarArticulo(Articulo $articulo){

        $this->articuloSeleccionado = $articulo;

        $this->reset('articulo');

    }

    public function abrirModalEditar(Entrada $modelo){

        $this->resetearTodo();

        $this->modelo_editar = $modelo;

        $this->articuloSeleccionado = Articulo::find($this->modelo_editar->articulo_id);

        $articuloDisponible = ArticuloDisponible::where('articulo_id', $this->articuloSeleccionado->id)->where('ubicacion', 'general')->first();

        $precioStock = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)
                                            ->where('entrada_id', $this->modelo_editar->id)
                                            ->first();

        if(PSD::where('precio_stock_id', $precioStock->id)->first()){

            $this->dispatch('mostrarMensaje', ['warning', "El artículo de esta entrada ya esta relacionado en una solicitud, no es posible editarla."]);

            return;

        }

        $this->precio_unidad = $precioStock->precio;

        $this->modal = true;

        $this->editar = true;

    }

    public function guardar(){

        $this->validate();

        try {

            DB::transaction(function () {

                $this->modelo_editar->articulo_id = $this->articuloSeleccionado->id;
                $this->modelo_editar->precio = $this->modelo_editar->cantidad * $this->precio_unidad;
                $this->modelo_editar->creado_por = auth()->user()->id;
                $this->modelo_editar->save();

                (new ArticuloDisponibleService())->crear($this->articuloSeleccionado->id, $this->modelo_editar->id, $this->modelo_editar->cantidad, $this->precio_unidad);

                /* $this->crearArticuloDisponible(); */

            });

            $this->resetearTodo($borrado = true);

            $this->dispatch('mostrarMensaje', ['success', "La entrada se creó con éxito."]);

        } catch (GeneralExpection $ex) {

            $this->dispatch('mostrarMensaje', ['warning', $ex->getMessage()]);

            $this->resetearTodo();

        } catch (\Throwable $th) {

            Log::error("Error al crear entrada por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function crearArticuloDisponible(){

        $articuloDisponible = ArticuloDisponible::where('articulo_id', $this->articuloSeleccionado->id)
                                                    ->where('ubicacion', 'general')
                                                    ->first();

        if($articuloDisponible){

            if($this->articuloSeleccionado->serial) throw new GeneralExpection('El artículo con el número de serie: ' . $this->articuloSeleccionado->serial . ' ya tiene una entrada.');

            PrecioStock::create([
                'articulo_disponible_id' => $articuloDisponible->id,
                'entrada_id' => $this->modelo_editar->id,
                'stock' => $this->modelo_editar->cantidad,
                'precio' => $this->precio_unidad
            ]);

            $stock_total = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)->sum('stock');

            $articuloDisponible->update(['stock_total' => $stock_total]);

        }else{

            $articuloDisponible = ArticuloDisponible::create([
                'articulo_id' => $this->articuloSeleccionado->id,
                'ubicacion' => 'general',
                'stock_total' => $this->modelo_editar->cantidad
            ]);

            PrecioStock::create([
                'articulo_disponible_id' => $articuloDisponible->id,
                'entrada_id' => $this->modelo_editar->id,
                'stock' => $this->modelo_editar->cantidad,
                'precio' => $this->precio_unidad
            ]);

        }

    }

    public function actualizarArticuloDisponible(){

        $articuloDisponible = ArticuloDisponible::where('articulo_id', $this->articuloSeleccionado->id)
                                                    ->where('ubicacion', 'general')
                                                    ->first();

        $precioStock = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)
                                    ->where('entrada_id', $this->modelo_editar->id)
                                    ->first();

        if($articuloDisponible->stock_total < $this->modelo_editar->cantidad){

            throw new GeneralExpection("La cantidad no puede ser mayor a: " . $articuloDisponible->stock_total . '.');

        }else{

            $precioStock->update([
                'stock' => $this->modelo_editar->cantidad,
                'precio' => $this->precio_unidad
            ]);

            $stock_total = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)->sum('stock');

            $articuloDisponible->update([
                'stock_total' => $stock_total
            ]);

        }

    }

    public function actualizar(){

        $this->validate();

        try{

            DB::transaction(function () {

                $this->modelo_editar->precio = $this->modelo_editar->cantidad * $this->precio_unidad;
                $this->modelo_editar->actualizado_por = auth()->user()->id;
                $this->modelo_editar->save();

                $this->actualizarArticuloDisponible();

            });

            $this->resetearTodo($borrado = true);

            $this->dispatch('mostrarMensaje', ['success', "La entrada se actualizó con éxito."]);

        } catch (GeneralExpection $ex) {

            $this->dispatch('mostrarMensaje', ['error', $ex->getMessage()]);

        }catch (\Throwable $th) {

            Log::error("Error al actualizar entrada por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function borrar(){

        try{

            $entrada = Entrada::find($this->selected_id);

            $articuloDisponible = ArticuloDisponible::where('articulo_id', $entrada->articulo_id)
                                                    ->where('ubicacion', 'general')
                                                    ->first();

            $precioStock = PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)
                                            ->where('entrada_id', $this->selected_id)
                                            ->first();

            if(PSD::where('precio_stock_id', $precioStock->id)->first()){

                 throw new GeneralExpection("El artículo de esta entrada ya esta relacionado en una solicitud, no es posible eliminarla.");

            }elseif($articuloDisponible->stock_total < $entrada->cantidad){

                throw new GeneralExpection("La cantidad en la entrada es mayor al stock del artículo.");

            }else  {

                DB::transaction(function () use($entrada, $articuloDisponible){

                    PrecioStock::where('articulo_disponible_id', $articuloDisponible->id)
                                    ->where('entrada_id', $entrada->id)
                                    ->delete();

                    $articuloDisponible->decrement('stock_total', $entrada->cantidad);

                    $entrada->delete();

                });

            }

            $this->resetearTodo();

            $this->dispatch('mostrarMensaje', ['success', "El entrada se eliminó con éxito."]);

        } catch (GeneralExpection $ex) {

            $this->dispatch('mostrarMensaje', ['warning', $ex->getMessage()]);

        } catch (\Throwable $th) {

            Log::error("Error al borrar entrada por el usuario: (id: " . auth()->user()->id . ") " . auth()->user()->name . ". " . $th);
            $this->dispatch('mostrarMensaje', ['error', "Ha ocurrido un error."]);
            $this->resetearTodo();

        }

    }

    public function mount(){

        $this->crearModeloVacio();

        array_push($this->fields,
                    'articulo',
                    'articuloSeleccionado',
                    'precio_unidad'
                );

    }

    public function render()
    {

        $entradas = Entrada::with('creadoPor', 'actualizadoPor', 'articulo:id,nombre,marca')
                                ->whereHas('articulo', function($q){
                                    $q->where('nombre', 'LIKE', '%' . $this->search . '%')
                                        ->orWhere('marca', 'LIKE', '%' . $this->search . '%');
                                })
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->pagination);

        return view('livewire.entradas.entradas', compact('entradas'))->extends('layouts.admin');
    }
}
