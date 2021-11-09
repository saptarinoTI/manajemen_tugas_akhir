<?php

use App\Http\Controllers\Admin\Mahasiswa\BiodataController;
use App\Http\Controllers\Admin\Mahasiswa\BiodataMahasiswaController;
use App\Http\Controllers\Admin\Mahasiswa\DataMahasiswaController;
use App\Http\Controllers\Admin\Mahasiswa\ImportDataMahasiswaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\Pendadaran\DataPendadaranController;
use App\Http\Controllers\Admin\Pendadaran\GetDataPendadaranController;
use App\Http\Controllers\Admin\Seminar\DataSeminarController;
use App\Http\Controllers\Admin\Seminar\DataSeminarHasilController;
use App\Http\Controllers\Admin\User\DataUserController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Mahasiswa\SeminarHasilController;

use App\Http\Controllers\Auth\AddEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mahasiswa\Datadiri\DataController;
use App\Http\Controllers\Mahasiswa\DataDiriController;
use App\Http\Controllers\Mahasiswa\PendadaranController;
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
    return redirect()->route('login');
});

// Add Email
Route::get('/add-email', [AddEmailController::class, 'index'])->name('add-email');
Route::post('/add-email', [AddEmailController::class, 'store'])->name('add-email.store');
// Update Password

// Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Route::middleware(['auth', 'verified', 'role:admin|superadmin'])->group(function () {
    // Users
    Route::resource('users', UserController::class)->except('show', 'edit', 'update');
    Route::get('datauser', DataUserController::class)->name('datauser');
    // Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class)->except('show', 'create', 'update', 'destroy', 'edit',);
    Route::get('datamahasiswa', DataMahasiswaController::class)->name('datamahasiswa');
    // Data Mahasiswa
    Route::get('data-mahasiswa', [BiodataController::class, 'index'])->name('data-mahasiswa.index');
    Route::post('data-mahasiswa', [BiodataController::class, 'store'])->name('data-mahasiswa.store');
    Route::delete('data-mahasiswa/{id}', [BiodataController::class, 'destroy'])->name('data-mahasiswa.destroy');
    Route::get('getdata-mahasiswa', BiodataMahasiswaController::class)->name('getdata-mahasiswa');
    // Data Seminar Hasil
    Route::resource('data-seminar', DataSeminarController::class)->except('create', 'store', 'destroy');
    Route::get('data-seminarhasil', DataSeminarHasilController::class)->name('data-seminarhasil.index');
    // Data Pendadaran
    Route::resource('data-pendadaran', DataPendadaranController::class)->except('create', 'store', 'destroy');
    Route::get('getdata-pendadaran', GetDataPendadaranController::class)->name('getdata-pendadaran');
});

Route::middleware(['auth', 'verified', 'role:mahasiswa|superadmin'])->group(function () {
    // Data Diri
    Route::resource('data-diri', DataDiriController::class)->except('show', 'delete');
    Route::get('get-mahasiswa', DataController::class)->name('get-mahasiswa');
    // Seminar Hasil
    Route::resource('seminar-hasil', SeminarHasilController::class);
    // Pendadaran
    Route::resource('pendadaran', PendadaranController::class);
});
