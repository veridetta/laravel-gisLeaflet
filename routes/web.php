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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PlaceMapController@index')->name('frontpage');
Route::get('/place/data', 'DataController@places')->name('place.data'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['admin']], function () {
    Route::resource('places', 'PlaceController');
    
});
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
Route::get('transaksi/edit/{id}', [App\Http\Controllers\TransaksiController::class, 'edit']);
Route::post('transaksi/update/{id}', [App\Http\Controllers\TransaksiController::class, 'update']);
Route::get('transaksi/destroy/{id}', [App\Http\Controllers\TransaksiController::class, 'destroy']);
Route::get('transaksi/print', [App\Http\Controllers\TransaksiController::class, 'print']);

Route::get('/places/index', function () { return view('places.index'); })->middleware('can:isAdmin')
       ->name('admin');
// SAMPLE MAP DISPLAY
//Route::get('/sample', 'PlaceController@sampleMap')->name('sample');