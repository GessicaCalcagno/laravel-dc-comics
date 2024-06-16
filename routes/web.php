<?php

use App\Http\Controllers\ComicController;
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

Route::get('/', function () {
    return view('home');
});

// Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');

Route::resource('/comics',ComicController::class);
//Non c'è bisogno di farlo ma nel caso non avessi aggiunto il metoto sopra avrei dovuto scrivere così       
//                                              nome della rotta
//Route::get('/comics/{comics}',[ComicController::class,'show'])->name('comic.show');