<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\ArticuloDisponible;
use App\Models\Entrada;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __invoke()
    {

        if(auth()->user()->roles[0]->name == "Solicitante" || auth()->user()->roles[0]->name == "Director"){

            $solicitudes = Solicitud::selectRaw('estado, count(estado) count')
                                    ->where('created_by', auth()->user()->id)
                                    ->groupBy('estado')
                                    ->get();

        }else{

            $solicitudes = Solicitud::selectRaw('estado, count(estado) count')
                                    ->groupBy('estado')
                                    ->get();

        }

        $entradas = Entrada::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data, sum(precio) sum')
                            ->groupBy('year', 'month')
                            ->orderBy('year', 'asc')
                            ->get();

        $data = [];

        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        foreach($entradas as $entrie){
            foreach($labels as $label){
                $data[$entrie->year][$label] = 0;
            }
        }

        foreach($entradas as $entrie){

            foreach($labels as $label){

                if($entrie->month === $label ){
                    if($data[$entrie->year][$label] == 0)
                        $data[$entrie->year][$label] = $entrie->sum;
                }
            }

        }

        $articles = ArticuloDisponible::whereColumn('stock_total', '<', 'alerta')->orderBy('stock_total', 'asc')->get();

        return view('dashboard', compact('data', 'solicitudes', 'articles'));
    }

}
