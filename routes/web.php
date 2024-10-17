<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerKlinikController;

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

// Route::middleware(['auth', 'preventCache', 'checkPermission:permission_name'])->group(function () {
//     // Definisikan rute Anda di sini
// });


// Route::middleware(['auth.check', 'preventCache'])->prefix('admin')->group(function ()  {
    
// });




Route::get('/', function(){
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function() {
    //dashboard
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');  

    //Permission
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);

    //Role
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::get('roles/{roles}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
    Route::put('roles/{roles}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');

    //User
    Route::resource('users', \App\Http\Controllers\UserController::class);

    //unit
    Route::resource('units', \App\Http\Controllers\UnitController::class);

    //kategori
    Route::resource('kategori', \App\Http\Controllers\KategoriController::class);

    //unit-permintaan
    Route::get('unit-permintaan', [\App\Http\Controllers\UnitPermintaanController::class, 'index'])->name('unit-permintaan.index');
    Route::get('unit-permintaan/create', [\App\Http\Controllers\UnitPermintaanController::class, 'create'])->name('unit-permintaan.create');
    Route::post('unit-permintaan/store', [\App\Http\Controllers\UnitPermintaanController::class, 'store'])->name('unit-permintaan.store');

    //manager klinik
    Route::get('manager-klinik', [\App\Http\Controllers\ManagerKlinikController::class, 'index'])->name('manager-klinik.index');
    Route::get('manager-klinik/{id}', [\App\Http\Controllers\ManagerKlinikController::class, 'show'])->name('manager-klinik.show');
    // Rute untuk menyetujui dan menolak barang
    Route::post('/approve-barang/{id}/manager-klinik', [\App\Http\Controllers\ManagerKlinikController::class, 'approveBarang'])->name('approve_barang');
    Route::post('/reject-barang/{id}/manager-klinik', [\App\Http\Controllers\ManagerKlinikController::class, 'rejectBarang'])->name('reject_barang');
    // Rute untuk surat telah di proses
    Route::post('/approve-surat/{id}/manager-klinik', [\App\Http\Controllers\ManagerKlinikController::class, 'approveSurat'])->name('approve_surat');
    Route::post('/manager-klinik/bulk-approve-barang', [ManagerKlinikController::class, 'bulkApproveBarang'])->name('bulk_approve_barang');


    //Suratt Permintaan
    Route::get('surat-permintaan', [\App\Http\Controllers\SuratPermintaanUnit::class, 'index'])->name('surat-permintaan-unit.index');
    Route::get('surat-permintaan/{id}/pdf', [\App\Http\Controllers\SuratPermintaanUnit::class, 'cetakPdf'])->name('surat-permintaan-unit.pdf');

    //Daftar permintaan
    Route::get('daftar-permintaan', [\App\Http\Controllers\DaftarPermintaan::class, 'index'])->name('daftar-permintaan.index');
    Route::get('daftar-permintaan/{id}/edit', [\App\Http\Controllers\DaftarPermintaan::class, 'edit'])->name('daftar-permintaan.edit');
    Route::put('daftar-permintaan/{id}/update', [\App\Http\Controllers\DaftarPermintaan::class, 'update'])->name('daftar-permintaan.update');

    //Kepala bidang
    Route::get('kepala-bidang', [\App\Http\Controllers\KepalaBidang::class, 'index'])->name('kepala-bidang.index');
    Route::get('kepala-bidang/{id}/edit', [\App\Http\Controllers\KepalaBidang::class, 'edit'])->name('kepala-bidang.edit');
    Route::put('kepala-bidang/{id}/update', [\App\Http\Controllers\KepalaBidang::class, 'update'])->name('kepala-bidang.update');

    //Manager Operasional
    Route::get('manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'index'])->name('manager-operational.index');
    Route::get('manager-operational/{id}', [\App\Http\Controllers\ManagerOperationalController::class, 'show'])->name('manager-operational.show');
    // Rute untuk menyetujui dan menolak barang
    // Route::post('/approve-barang/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'approveBarang'])->name('approve_barang.operational');
    // Route::post('/reject-barang/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'rejectBarang'])->name('reject_barang.operational');
    // // Rute untuk surat telah di proses
    Route::post('/approve-surat/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'approveSurat'])->name('approve_surat.operational');

    // Memo Permintaan
    Route::get('memo-permintaan', [\App\Http\Controllers\MemoPermintaanController::class, 'index'])->name('memo-permintaan.index');
    Route::get('memo-permintaan/{id}/pdf', [\App\Http\Controllers\MemoPermintaanController::class, 'cetakPdf'])->name('memo-permintaan.pdf');

     //Manager keuangan
     Route::get('manager-keuangan', [\App\Http\Controllers\ManagerKeuanganController::class, 'index'])->name('manager-keuangan.index');
     Route::get('manager-keuangan/{id}', [\App\Http\Controllers\ManagerKeuanganController::class, 'show'])->name('manager-keuangan.show');
     // Rute untuk menyetujui dan menolak barang
     // Route::post('/approve-barang/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'approveBarang'])->name('approve_barang.operational');
     // Route::post('/reject-barang/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'rejectBarang'])->name('reject_barang.operational');
     // // Rute untuk surat telah di proses
     Route::post('/approve-surat/{id}/manager-keuangan', [\App\Http\Controllers\ManagerKeuanganController::class, 'approveSurat'])->name('approve_surat.keuangan');

    //Direktur
    Route::get('direktur', [\App\Http\Controllers\DirekturController::class, 'index'])->name('direktur.index');
    Route::get('direktur/{id}', [\App\Http\Controllers\DirekturController::class, 'show'])->name('direktur.show');
    // Rute untuk menyetujui dan menolak barang
    // Route::post('/approve-barang/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'approveBarang'])->name('approve_barang.operational');
    // Route::post('/reject-barang/{id}/manager-operational', [\App\Http\Controllers\ManagerOperationalController::class, 'rejectBarang'])->name('reject_barang.operational');
    // // Rute untuk surat telah di proses
    Route::post('/approve-surat/{id}/direktur', [\App\Http\Controllers\DirekturController::class, 'approveSurat'])->name('approve_surat.direktur');

     // Memo Persetujuan
     Route::get('memo-persetujuan', [\App\Http\Controllers\MemoPersetujuanController::class, 'index'])->name('memo-persetujuan.index');
     Route::get('memo-persetujuan/{id}/pdf', [\App\Http\Controllers\MemoPersetujuanController::class, 'cetakPdf'])->name('memo-persetujuan.pdf');


}); 






