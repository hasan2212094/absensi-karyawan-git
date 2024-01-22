<?php

use Illuminate\Support\Facades\Route;
use App\Models\Presensi;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/scan/create',[PresensiController::class,'create'])->name('scan.create.masuk');
Route::get('/scan/create',[PresensiController::class,'index'])->name('scan.index.masuk');
Route::post('/scan/store', [PresensiController::class, 'store'])->name('scan.store.masuk');

Route::get('/scan/create/pulang',[PresensiController::class,'create_pulang'])->name('scan.create.pulang');
Route::get('/scan/create/pulang',[PresensiController::class,'index_pulang'])->name('scan.index.pulang');
Route::post('/scan/store/pulang', [PresensiController::class, 'store_pulang'])->name('scan.store.pulang');

Route::get('/scan/create/lembur',[PresensiController::class,'create_lembur'])->name('scan.create.lembur');
Route::get('/scan/create/lembur',[PresensiController::class,'index_lembur'])->name('scan.index.lembur');
Route::post('/scan/store/lembur', [PresensiController::class, 'store_lembur'])->name('scan.store.lembur');

Route::get('/index/detail',[PresensiController::class,'index_detail'])->name('index_detail');
Route::get('/filter/detail',[PresensiController::class,'filter_detail'])->name('filter_detail');
Route::delete('/delete/{presensis}', [PresensiController::class,'delete_presensis'])->name('delete_presensis');
Route::get('/exportpresensis', [PresensiController::class,'presensis_exports'])->name('presensis_exports');

Route::get('/',[KaryawanController::class,'index'])->name('index');
Route::get('/show/{id}', [KaryawanController::class,'show'])->name('show');
Route::get('/create ' , [KaryawanController::class,'create'])->name('create');
Route::post('/create',[KaryawanController::class,'store'])->name('store');
Route::get('/edit/{karyawan}', [KaryawanController::class,'edit_karyawan'])->name('edit_karyawan');
Route::patch('/update/{karyawan}', [KaryawanController::class,'update_karyawan'])->name('update_karyawan');
Route::delete('/delete/{karyawan}', [KaryawanController::class,'delete_karyawan'])->name('delete_karyawan');
Route::get('/profile/{karyawan}',[KaryawanController::class, 'profile_karyawan'])->name('profile_karyawan');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
