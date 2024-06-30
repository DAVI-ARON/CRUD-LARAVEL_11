<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\CheckIfIsAdmin;

Route::middleware('auth')->group(function () {
    Route::delete('/users/{userId}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIfIsAdmin::class);
    Route::get('/users/{userId}/show', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{userId}', [UserController::class, 'update'])->name('users.update')->middleware(CheckIfIsAdmin::class);
    Route::get('/users/{userId}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(CheckIfIsAdmin::class);
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware(CheckIfIsAdmin::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); //É sempre importante definir um nome para nossa rota, esse nome pode ser usado depois para refencia-la em caso de alteração na rota e nos demais arquivos
});

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    return view('admin.users.index');
});
