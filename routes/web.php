<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::put('/users/{userId}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{userId}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index'); //É sempre importante definir um nome para nossa rota, esse nome pode ser usado depois para refencia-la em caso de alteração na rota e nos demais arquivos

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
