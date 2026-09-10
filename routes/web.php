<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sitio-seguro', function(){
    return view('welcome');
})->middleware('cabecera.seguridad');

Route::get('/validar-codigo', function(Request $request){
    return response()->json([
        'codigo' => $request->input('codigo')
    ]);
})->middleware('sanitizar');
Route::get('/area-protegida', function () {
    return 'Has entrado al área protegida';
})->middleware('clave.acceso');
