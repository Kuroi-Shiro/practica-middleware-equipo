<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidarClaveAcceso
{
    public function handle(Request $request, Closure $next): Response
    {
        // Validar la cabecera
        $clave = $request->header('X-Access-Key');

        if ($clave !== 'SECRET123') {
            return response()->json([
                'mensaje' => 'Acceso denegado: Clave incorrecta'
            ], 401);
        }

        // Validar el rol
        if ($request->query('rol') !== 'admin') {
            return response()->json([
                'mensaje' => 'Acceso denegado: Se requiere rol de administrador'
            ], 403);
        }

        return $next($request);
        //if ($request->header('X-Access-Key') !== 'SECRET123') {
        //    return response()->json([
        //        'error' => 'No autorizado',
        //        'mensaje' => 'La cabecera X-Access-Key es requerida o no es válida.'
        //    ], 401);
        //}

        return $next($request);
    }
}
