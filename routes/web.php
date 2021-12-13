<?php

use Illuminate\Support\Facades\Route;

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
});*/

// redirect to movies page
Route::redirect('/', '/movies');

// display movies page
Route::get('/movies', [
    'App\Http\Controllers\MovieController',
    'index'
])->name('movies_index');

// display series page
Route::get('/series', [
    'App\Http\Controllers\SerieController',
    'index'
])->name('series_index');
