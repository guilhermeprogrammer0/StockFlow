<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'index']);
Route::get('/login',[LoginController::class,'index']);
Route::post('/login_submit',[LoginController::class,'login_submit'])->name('login_submit');
