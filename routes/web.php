<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;

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

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('post',[HomeController::class,'post'])->middleware(('auth'),('admin'));


//CRUDSD+Scanner
Route::get('/ManajemenItemUser', [BarangController::class, 'index'])->name('barang');
Route::get('/detailBarang/{SN}', [BarangController::class, 'detailBarang'])->name('detailBarang');

Route::get('/barangQRScanner', [BarangController::class, 'scanner'])->name('barangQRScanner');
Route::post('/scan', [BarangController::class, 'scan'])->name('scan');
Route::get('/barangQRScanner', [BarangController::class, 'scanner'])->name('scanner');


//Admin
Route::get('/ManajemenItem', [BarangController::class, 'index'])->name('barang')->middleware(('auth'),('admin'));
Route::get('/tambahBarang', [BarangController::class, 'tambahBarang'])->name('tambahBarang')->middleware(('auth'),('admin'));
Route::post('/insertBarang', [BarangController::class, 'store'])->name('insertBarang')->middleware(('auth'),('admin'));
// Route::post('/insertBarang', [BarangController::class, 'insertBarang'])->name('insertBarang');

Route::get('/tampilBarang/{SN}', [BarangController::class, 'tampilBarang'])->name('tampilBarang')->middleware(('auth'),('admin'));
Route::post('/updateBarang/{SN}', [BarangController::class, 'updateBarang'])->name('updateBarang')->middleware(('auth'),('admin'));
Route::get('/hapusBarang/{SN}', [BarangController::class, 'hapusBarang'])->name('hapusBarang')->middleware(('auth'),('admin'));


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// require _DIR_.'/auth.php';
require __DIR__.'/auth.php';
