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

/*Route::get('/', function () {
    return view('welcome');
});

// redirect to movies page
Route::redirect('/', '/movies');

// display movies page
Route::get('/movies', [
    'App\Http\Controllers\MovieController',
    'create'
])->name('movies.create');

// display login page
Route::get('/login', [
    'App\Http\Controllers\SerieController',
    'create'
])->name('series.create'); */

# https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller


// Definir les routes reservées aux utilisateurs connectés
// Ici le middleware 'auth' verifie que l'utilisateur est identifié
Route::group(['middleware' => 'auth'], function () {

    // Les utilisateurs connectés ont accès à tout sauf à index et à show
    Route::resource('movies', MovieController::class, ['except' => ['index', 'show']]);
    Route::resource('series', SerieController::class, ['except' => ['index', 'show']]);

    // Je peux me logout que quand je suis connecté 
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Définir les routes réservées aux utilisateurs non-connectés 
Route::group(['middleware' => 'guest'], function () {

    Route::get('login', function () {
        return view('auth.login');
    })->name('auth.login');
    
    Route::post('login', [AuthController::class, 'login'])->name('auth.login.action');
});

// On définit les routes accessibles à tout le monde 
// Génère toutes les routes qui sont liées à la ressource 'movies', par contre ne me génère que les routes'index' et 'show'.
Route::resource('movies', MovieController::class, ['only' => ['index', 'show']]);
Route::resource('series', SerieController::class, ['only' => ['index', 'show']]);



