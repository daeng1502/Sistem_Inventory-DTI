<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PengadaanController;


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



Route::group(['prefix' => 'distribusi', 'as' => 'distribusi.'], function () {

    Route::get('/data', [DistribusiController::class, 'index'])->name('data');
    Route::get('/add', [DistribusiController::class, 'add'])->name('add');
    Route::get('/view', [DistribusiController::class, 'view'])->name('view');
    Route::post('/save', [DistribusiController::class, 'save'])->name('save');
    Route::get('/edit/{id}', [DistribusiController::class, 'edit'])->name('edit');
    Route::get('/edit_view/{id}', [DistribusiController::class, 'edit_view'])->name('edit_view');
    Route::post('/update', [DistribusiController::class, 'update'])->name('update');
    Route::get('/aktif', [DistribusiController::class, 'aktif'])->name('aktif');
    Route::post('/nonaktif', [DistribusiController::class, 'nonaktif'])->name('nonaktif');

    Route::get('/combo_pegawai', [DistribusiController::class, 'combo_pegawai'])->name('combo_pegawai');
    Route::get('/combo_lokasi', [DistribusiController::class, 'combo_lokasi'])->name('combo_lokasi');
    
});

Route::group(['prefix' => 'lokasi', 'as' => 'lokasi.'], function () {

    Route::get('/data', [LokasiController::class, 'index'])->name('data');
    Route::get('/add', [LokasiController::class, 'add'])->name('add');
    Route::get('/view', [LokasiController::class, 'view'])->name('view');
    Route::post('/save', [LokasiController::class, 'save'])->name('save');
    Route::get('/edit/{id}', [LokasiController::class, 'edit'])->name('edit');
    Route::get('/edit_view/{id}', [LokasiController::class, 'edit_view'])->name('edit_view');
    Route::post('/update', [LokasiController::class, 'update'])->name('update');
    Route::get('/aktif', [LokasiController::class, 'aktif'])->name('aktif');
    Route::post('/nonaktif', [LokasiController::class, 'nonaktif'])->name('nonaktif');
    
});

Route::get('/combo_barang', [BarangController::class, 'combo_barang'])->name('combo_barang');





















Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('post',[HomeController::class,'post'])->middleware(('auth'),('admin'));


//--Router Modul Barang start--
//CRUDSD+Scanner
Route::get('/ManajemenItemUser', [BarangController::class, 'index'])->name('barang');
Route::get('/detailBarangUser/{SN}', [BarangController::class, 'detailBarang'])->name('detailBarangUser');
Route::get('/barangQRScanner', [BarangController::class, 'scanner'])->name('barangQRScanner');
Route::post('/scan', [BarangController::class, 'scan'])->name('scan');
Route::get('/barangQRScannerUser', [BarangController::class, 'scanner'])->name('scanner');

//Admin
Route::get('/ManajemenItem', [BarangController::class, 'index'])->name('barang')->middleware(('auth'),('admin'));
Route::get('/tambahBarang', [BarangController::class, 'tambahBarang'])->name('tambahBarang')->middleware(('auth'),('admin'));
Route::post('/insertBarang', [BarangController::class, 'store'])->name('insertBarang')->middleware(('auth'),('admin'));
Route::get('/tampilBarang/{SN}', [BarangController::class, 'tampilBarang'])->name('tampilBarang')->middleware(('auth'),('admin'));
Route::post('/updateBarang/{SN}', [BarangController::class, 'updateBarang'])->name('updateBarang')->middleware(('auth'),('admin'));
Route::get('/hapusBarang/{SN}', [BarangController::class, 'hapusBarang'])->name('hapusBarang')->middleware(('auth'),('admin'));
Route::get('/detailBarang/{SN}', [BarangController::class, 'detailBarang'])->name('detailBarang')->middleware(('auth'),('admin'));
Route::get('/barangQRScanner', [BarangController::class, 'scanner'])->name('scanner');
//--Router Modul Barang end--


//--Router Modul User start--
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
//--Router Modul User stendart--



//--Router Modul Maintenance start--
Route::get('/UserMaintenance', [MaintenanceController::class, 'index'])->name('maintenance.data_user');
Route::get('/Maintenance', [MaintenanceController::class, 'index'])->name('maintenance.data')->middleware(('auth'),('admin'));
Route::get('/request-maintenance', [MaintenanceController::class, 'tambahRequest'])->name('maintenance.tambah');
Route::post('/insert-request', [MaintenanceController::class, 'insertRequest'])->name('maintenance.insert');
Route::get('/delete-request{id}', [MaintenanceController::class, 'delete'])->name('maintenance.delete')->middleware(('auth'),('admin'));
Route::get('/showRequest/{id}', [MaintenanceController::class, 'showRequest'])->name('maintenance.showRequest')->middleware(('auth'),('admin'));
Route::post('/updateRequest/{id}', [MaintenanceController::class, 'updateRequest'])->name('maintenance.updateRequest')->middleware(('auth'),('admin'));
//--Router Modul Maintenance end--


//--Router Modul Pengadaan start--
Route::get('/UserProcurement', [PengadaanController::class, 'index'])->name('pengadaan.data_user');
Route::get('/Procurement', [PengadaanController::class, 'index'])->name('pengadaan.data')->middleware(('auth'),('admin'));
Route::get('/request-pengadaan', [PengadaanController::class, 'tambahRequest'])->name('tambahPengadaan');
Route::post('/insert-requestPengadaan', [PengadaanController::class, 'insertRequest'])->name('insertPengadaan');
Route::get('/delete-requestPengadaan/{id}', [PengadaanController::class, 'delete'])->name('pengadaan.delete')->middleware(('auth'),('admin'));
Route::get('/showRequestPengadaan/{id}', [PengadaanController::class, 'showRequest'])->name('pengadaan.showRequest')->middleware(('auth'),('admin'));
Route::post('/updateRequestPengadaan/{id}', [PengadaanController::class, 'updateRequest'])->name('pengadaan.updateRequest')->middleware(('auth'),('admin'));


//--Router Modul Pengadaan end--


// Eksport Laporan Barang
Route::get('/dataBarang', [BarangController::class, 'dataBarang'])->name('dataBarang');
Route::get('/exportBarang', [BarangController::class, 'exportBarang'])->name('exportBarang');
Route::get('/dataMaintenance', [MaintenanceController::class, 'dataMaintenance'])->name('dataMaintenance');
Route::get('/exportMaintenance', [MaintenanceController::class, 'exportMaintenance'])->name('exportMaintenance');
Route::get('/dataPengadaan', [PengadaanController::class, 'dataPengadaan'])->name('dataPengadaan');
Route::get('/exportPengadaan', [PengadaanController::class, 'exportPengadaan'])->name('exportPengadaan');
Route::get('/dataDistribusi', [DistribusiController::class, 'dataDistribusi'])->name('dataDistribusi');
Route::get('/exportDistribusi', [DistribusiController::class, 'exportDistribusi'])->name('exportDistribusi');

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

//route::get('/requestMaintenance',[RequestController::class,'requestMaintenance']);

Route::get('/riwayatMaintenance', function () {
    return view('riwayatMaintenance');
});

