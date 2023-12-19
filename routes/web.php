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

Route::get('/', function () {
    return view('index');
});

//route untuk data pakaian
Route::get('/pakaian','PakaianController@pakaiantampil');
Route::post('pakaian/tambah','PakaianController@pakaiantambah');
Route::get('pakaian/hapus/{id_pakaian}','PakaianController@pakaianhapus');
Route::put('pakaian/edit/{id_pakaian}','PakaianController@pakaianedit');

//route untuk data pakaian
Route::get('/HOME', function(){return view('view_home');});

//route untuk data pakaian
Route::get('/beli', 'BeliController@belitampil');