<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ToursController;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [ToursController::class, 'mostrar'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tour/{slug}', [ToursController::class, 'show'])->name('tour.show');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('tours', ToursController::class)->names('tours');
    Route::resource('categorias', CategoriasController::class)->names('cats');
});
