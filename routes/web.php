<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EnlacesController;
use App\Http\Controllers\EntagController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToursController::class, 'mostrar'])->name('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/peru-packages',[EnlacesController::class, 'packages'])->name('packages');
Route::get('/peru-adventures',[EnlacesController::class, 'adventures'])->name('adventures');
Route::get('/peru-gastronomy',[EnlacesController::class, 'gastronomy'])->name('gastronomy');
Route::get('/spiritual',[EnlacesController::class, 'spiritual'])->name('spiritual');
Route::post('/reservas',[EmailController::class, 'tourEmail'])->name('reservas');

//Blog & Destinies
Route::get('/peru-blog',[EnlacesController::class, 'blogen'])->name('blogen');
Route::get('/destinies',[EnlacesController::class, 'destinies'])->name('destinies');
Route::get('/tour/{slug}', [ToursController::class, 'show'])->name('tour.show');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('tours', ToursController::class)->names('tours');
    Route::resource('categorias', CategoriasController::class)->names('cats');
    Route::resource('imagenes', ImageController::class)->names('images');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('destinies', DestinoController::class)->names('destinies');
    Route::resource('en-blogs', BlogController::class)->names('enblogs');
    Route::resource('tagsIngles', EntagController::class)->names('entags');
});
Route::get('destiny/{slug}', [DestinoController::class, 'show'])->name('destinies.show');
