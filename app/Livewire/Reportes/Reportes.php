<?php

namespace App\Livewire\Reportes;

use Livewire\Component;

class Reportes extends Component
{

    public $area;
    public $fecha1;
    public $fecha2;

    public $verArticulos = false;
    public $verEntradas = false;
    public $verSolicitudes = false;
    public $verGastos = false;

    protected function rules(){
        return [
            'fecha1' => 'required|date',
            'fecha2' => 'required|date|after:date1',
         ];
    }

    protected $messages = [
        'fecha1.required' => "La fecha inicial es obligatoria.",
        'fecha2.required' => "La fecha final es obligatoria.",
    ];

    public function updatedArea(){

        if($this->area == 'articulos'){

            $this->reset([
                'verArticulos',
                'verEntradas',
                'verSolicitudes',
                'verGastos',
            ]);

            $this->verArticulos = true;

        }elseif($this->area == 'entradas'){

            $this->reset([
                'verArticulos',
                'verEntradas',
                'verSolicitudes',
                'verGastos',
            ]);

            $this->verEntradas = true;

        }elseif($this->area == 'solicitudes'){

            $this->reset([
                'verArticulos',
                'verEntradas',
                'verSolicitudes',
                'verGastos',
            ]);

            $this->verSolicitudes = true;

        }elseif($this->area == 'gastos'){

            $this->reset([
                'verArticulos',
                'verEntradas',
                'verSolicitudes',
                'verGastos',
            ]);

            $this->verGastos = true;

        }

    }

    public function mount(){

        $this->area = request()->query('area');

        $this->fecha1 = request()->query('fecha1');

        $this->fecha2 = request()->query('fecha2');

        $this->updatedArea();

    }

    public function render()
    {
        return view('livewire.reportes.reportes')->extends('layouts.admin');
    }
}
