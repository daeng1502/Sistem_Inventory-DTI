<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::get('/ManajemenItem', [BarangController::class, 'index'])->name('barang');
Route::get('/tambahBarang', [BarangController::class, 'tambahBarang'])->name('tambahBarang');
Route::post('/insertBarang', [BarangController::class, 'insertBarang'])->name('insertBarang');
Route::get('/tampilBarang/{SN}', [BarangController::class, 'tampilBarang'])->name('tampilBarang');
Route::post('/updateBarang/{SN}', [BarangController::class, 'updateBarang'])->name('updateBarang');
Route::get('/hapusBarang/{SN}', [BarangController::class, 'hapusBarang'])->name('hapusBarang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/requestMaintenance', function () {
    return view('requestMaintenance');
});
