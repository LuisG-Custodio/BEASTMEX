<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_beast;

Route::get('/bp', function () {
    return view('busqueda_empleado');
});
