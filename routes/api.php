<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get ('/', function(){
    return Auth::user()->level;
})->middleware('jwt.verify');
Route::post('register', 'petugascontroller@register');
Route::post('login', 'petugascontroller@login');
Route::get('petugas', 'petugascontroller@getAuthenticatedUser')->middleware('jwt.verify');

//pelanggan
Route::post('/simpan_pelanggan','pelanggancontroller@store')->middleware('jwt.verify');
Route::put('/ubah_pelanggan/{id}','pelanggancontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_pelanggan/{id}','pelanggancontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_pelanggan','pelanggancontroller@tampil_pelanggan')->middleware('jwt.verify');
Route::get('pelanggan',"pelanggancontroller@index")->middleware('jwt.verify');

//jenis
Route::post('/simpan_jenis','jeniscontroller@store')->middleware('jwt.verify');
Route::put('/ubah_jenis/{id}','jeniscontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_jenis/{id}','jeniscontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_jenis','jeniscontroller@tampil_jenis')->middleware('jwt.verify');
Route::get('jenis',"jeniscontroller@index")->middleware('jwt.verify');

//transaksi
Route::post('/simpan_transaksi','transaksicontroller@store')->middleware('jwt.verify');
Route::put('/ubah_transaksi/{id}','transaksicontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_transaksi/{id}','transaksicontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_transaksi/{tgl_transaksi}/{tgl_selesai}','transaksicontroller@tampil_transaksi')->middleware('jwt.verify');
Route::get('transaksi',"transaksicontroller@index")->middleware('jwt.verify');

//detail
Route::post('/simpan_detail','detail_transaksicontroller@store')->middleware('jwt.verify');
Route::put('/ubah_detail/{id}','detail_transaksicontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_detail/{id}','detail_transaksicontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_detail','detail_transaksicontroller@tampil_detail')->middleware('jwt.verify');
