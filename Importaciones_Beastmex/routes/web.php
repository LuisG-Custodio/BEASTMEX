<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_beast;

Route::get('/home', function () {
    return view('home');
});

