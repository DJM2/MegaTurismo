<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EnlacesController;
use App\Http\Controllers\ToursController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToursController::class, 'mostrar'])->name('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/peru-packages',[EnlacesController::class, 'packages'])->name('packages');
Route::get('/peru-adventures',[EnlacesController::class, 'adventures'])->name('adventures');
Route::get('/peru-gastronomy',[EnlacesController::class, 'gastronomy'])->name('gastronomy');
Route::get('/spiritual',[EnlacesController::class, 'spiritual'])->name('spiritual');


Route::get('/tour/{slug}', [ToursController::class, 'show'])->name('tour.show');
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('tours', ToursController::class)->names('tours');
    Route::resource('categorias', CategoriasController::class)->names('cats');
});
