<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });


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
Route::get('/tampilBarang/{SN}', [BarangController::class, 'tampilBarang'])->name('tampilBarang')->middleware(('auth'),('admin'));
Route::post('/updateBarang/{SN}', [BarangController::class, 'updateBarang'])->name('updateBarang')->middleware(('auth'),('admin'));
Route::get('/hapusBarang/{SN}', [BarangController::class, 'hapusBarang'])->name('hapusBarang')->middleware(('auth'),('admin'));

// Menampilkan daftar user
Route::get('/user', [UserController::class, 'index'])->name('user');

// Menampilkan form tambah user
Route::get('/createUser', [UserController::class, 'createUser'])->name('createUser');
Route::post('/insertUser', [UserController::class, 'insertUser'])->name('insertUser');

// Menampilkan form edit user
Route::get('/showUser/{id}', [UserController::class, 'showUser'])->name('showUser');
Route::post('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');

// Menghapus user
Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// require _DIR_.'/auth.php';
require __DIR__.'/auth.php';


// Route::get('/requestMaintenance', function () {
//     return view('requestMaintenance');
// });

route::get('/requestMaintenance',[RequestController::class,'requestMaintenance']);

Route::get('/riwayatMaintenance', function () {
    return view('riwayatMaintenance');
});

