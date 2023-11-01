<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_beast;

Route::get('/login', function () {
    return view('login');
});
