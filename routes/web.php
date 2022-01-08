<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect("/", "/movies");

# https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller


// Definir les routes reservées aux utilisateurs connectés
// Ici le middleware 'auth' verifie que l'utilisateur est identifié
Route::middleware('auth')->group(function () {
    // Je peux me logout que quand je suis connecté 
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Les utilisateurs connectés ont accès à tout sauf à index et à show
    Route::resource('movies', MovieController::class);
    Route::resource('series', SerieController::class);

    // Cette route renvoie vers la méthode searchApi qui se trouve dans mon ShowController
    Route::get('/shows/searchApi', [ShowController::class, 'searchApi'])->name('shows.searchApi');
});

// Définir les routes réservées aux utilisateurs non-connectés 
Route::middleware('guest')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login.action');

    Route::get('login', function () {
        return view('auth.login');
    })->name('auth.login');
});

// On définit les routes accessibles à tout le monde 
// Génère toutes les routes qui sont liées à la ressource 'movies', par contre ne me génère que les routes'index' et 'show'.
// Attention a bien les mettre en bas du fichier de route pour eviter les problemes de priorités de routes
Route::resource('movies', MovieController::class)->only(['index', 'show']);
Route::resource('shows', ShowController::class)->only(['index', 'show']);



