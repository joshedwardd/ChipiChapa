<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AdminBarangController;

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::resource('admin/barang', AdminBarangController::class)
         ->names('admin.barang');
   
});

Route::get('/barangs', [BarangController::class, 'listView']);
Route::get('/barangs/{id}', [BarangController::class, 'show'])
     ->where('id', '[0-9]+');


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

Route::get('/', function () {
    return view('program');
});
