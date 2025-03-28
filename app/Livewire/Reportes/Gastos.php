<?php

namespace App\Livewire\Reportes;

use Livewire\Component;
use App\Models\Solicitud;

class Gastos extends Component
{

    public $fecha1;
    public $fecha2;


    public function render()
    {

        $solicitudes = Solicitud::whereBetween('created_at', [$this->fecha1 . ' 00:00:00', $this->fecha2 . ' 23:59:59'])->get();


        return view('livewire.reportes.gastos', compact('solicitudes'));
    }
}
