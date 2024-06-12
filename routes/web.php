<?php

use Illuminate\Support\Facades\Route;
// tambahkan use disini untuk mengimport class dari route yang kita buat
use App\Http\Controllers\MahasiswaController;

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
    return view('welcome');
});

// setelah membuat controller, kesini ya, buat akses

// TAMPILAN
Route::get('/adminIndex', [MahasiswaController::class, 'adminIndex']);
Route::get('/adminAdd', [MahasiswaController::class, 'adminAdd']);
Route::get('/adminEdit', [MahasiswaController::class, 'adminEdit']);

// FUNGSI CRUD

Route::get('/add', [MahasiswaController::class, 'AddAdmin']);
Route::get('/edit', [MahasiswaController::class, 'EditAdmin']);
Route::get('/delete/{id}', [MahasiswaController::class, 'DeleteAdmin']);

// Route::get('/AddAdmin', [MahasiswaController::class, 'AddAdmin']);
// Route::get('/EditAdmin/{id}', [MahasiswaController::class, 'EditAdmin']);
// Route::get('/DeleteAdmin{id}', [MahasiswaController::class, 'DeleteAdmin']);