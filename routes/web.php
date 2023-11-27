<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
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
    return view('layout.main');
});

//Band
Route::get('/allBands', [BandController::class,'getBand'])->name('all_bands');
Route::get('/viewBand/{id}', [BandController::class,'viewBand'])->name('view_band');
Route::get('/deleteBand/{id}', [BandController::class,'deleteBand'])->name('delete_band');
Route::post('/storeBand', [BandController::class,'storeBand'])->name('store_band');
Route::get('/addBand', [BandController::class,'addBand'])->name('add_band');
Route::get('/viewBandAlbums/{id}', [BandController::class,'viewBandAlbums'])->name('view_bandAlbums');

//Album
Route::get('/allAlbums', [AlbumController::class,'getAlbum'])->name('all_albums');
Route::get('/addAlbum', [AlbumController::class,'addAlbum'])->name('add_album');
Route::post('/storeAlbum', [AlbumController::class,'storeAlbum'])->name('store_album');
Route::get('/viewAlbum/{id}', [AlbumController::class,'viewAlbum'])->name('view_album');
Route::get('/deleteAlbum/{id}', [AlbumController::class,'deleteAlbum'])->name('delete_album');

//Dashboard
Route::get('/dashboard', function () {return view('backoffice.dashboard');})->name('dashboard')->middleware('auth');
