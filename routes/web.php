<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::view('/home','home');
    Route::get('/', function () {
        return view('produtos');
    });
});

