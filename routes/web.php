<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource("albumes", AlbumController::class)->parameters(['albumes' => 'album'])->middleware("auth");
Route::resource("artistas", ArtistaController::class)->middleware("auth");;
Route::resource("temas", TemaController::class)->middleware("auth");;

Route::get('/temas/{tema}/añadir-artista', [TemaController::class, 'añadirArtista'])->name('temas.añadirArtista');
Route::get('/temas/{tema}/añadir-album', [TemaController::class, 'añadirAlbum'])->name('temas.añadirAlbum');
Route::put('/temas/{tema}/añadir-artista/guardar', [TemaController::class, 'guardarArtista'])->name('temas.guardarArtista');
Route::put('/temas/{tema}/añadir-album/guardar', [TemaController::class, 'guardarAlbum'])->name('temas.guardarAlbum');
Route::get('/artistas/albumes/{artista}', [ArtistaController::class, 'albumes'])->name('artistas.albumes');

require __DIR__.'/auth.php';
