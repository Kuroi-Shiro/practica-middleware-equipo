<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/area-protegida', function () {
    return 'Has entrado al área protegida';
})->middleware('clave.acceso');
