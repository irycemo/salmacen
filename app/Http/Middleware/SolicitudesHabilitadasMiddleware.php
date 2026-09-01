<?php

namespace App\Http\Middleware;

use App\Models\Configuracion;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SolicitudesHabilitadasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $configuracion = Configuracion::first();

        if($configuracion->solicitudes == false){

            abort(403, message: 'Las solicitudes están deshabilitadas.');

        }

        return $next($request);
    }
}
