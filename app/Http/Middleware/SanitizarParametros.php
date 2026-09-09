<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SanitizarParametros
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('codigo')) {
            $request->merge([
                'codigo' => strtoupper($request->input('codigo'))
            ]);
        }
        $response = $next($request);
        $response->headers->set('X-Procesado-Por', 'Middleware-Laravel');

        return $response;
    }
}
