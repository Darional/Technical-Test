<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;


Route::middleware(['auth:sanctum'])->get('/users', function (Request $request) {
    return $request->users();
});

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/login', [LoginController::class, 'login']);