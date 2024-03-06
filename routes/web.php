<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SiswaController;
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

// http://127.0.0.1:8000/ -> view

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/siswa', function () {
//     return '<h1>Saya siswa</h1>';
// });

// Route::get('/siswa/{id}', function ($id) {
//     return "<h1>Saya siswa dengan $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/siswa/{id}/{nama}', function ($id,$nama) {
//     return "<h1>Saya siswa dengan $id dan nama saya $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

Route::get('siswa', [SiswaController::class, 'index']);
Route::get('siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');

Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);