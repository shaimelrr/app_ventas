<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{id}/edit', [CategoryController::class,'edit'])->name('categories.edit');
Route::post('/category/store',[CategoryController::class,'store'])->name('categories.store');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



//Route::get('/clientes', [ClientController::class,'index'])->name('clients.index');


//rutas categoria
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}/edit', [ClientController::class,'edit'])->name('clients.edit');
Route::post('/clients/store',[ClientController::class,'store'])->name('clients.store');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

