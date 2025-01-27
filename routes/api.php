<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('novo_projeto', function(){
    return 'Novo projeto pronto!!';
}); 

// Route::get();
