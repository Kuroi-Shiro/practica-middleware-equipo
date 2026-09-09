<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgregarCabeceraSeguridad
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Ejecuta primero la petición
        $response = $next($request);

        // 2. Modifica la respuesta de salida agregando un encabezado HTTP
        $response->headers->set('X-Frame-Options', 'DENY');

        return $response;
    }
}