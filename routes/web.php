<?php

use App\Http\Controllers\Admin\Dosen\DosenController;
use App\Http\Controllers\Admin\GetDataLulusController;
use App\Http\Controllers\Admin\LulusController;
use App\Http\Controllers\Admin\Mahasiswa\BiodataController;
use App\Http\Controllers\Admin\Mahasiswa\BiodataMahasiswaController;
use App\Http\Controllers\Admin\Mahasiswa\DataMahasiswaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\Pendadaran\DataPendadaranController;
use App\Http\Controllers\Admin\Pendadaran\GetDataPendadaranController;
use App\Http\Controllers\Admin\Proposal\DataProposalController;
use App\Http\Controllers\Admin\Proposal\ProposalController;
use App\Http\Controllers\Admin\Seminar\DataSeminarController;
use App\Http\Controllers\Admin\Seminar\DataSeminarHasilController;
use App\Http\Controllers\Admin\User\DataUserController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Mahasiswa\SeminarHasilController;

use App\Http\Controllers\Auth\AddEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dosen\DataDosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JudulTugasAkhirController;
use App\Http\Controllers\Mahasiswa\Datadiri\DataController;
use App\Http\Controllers\Mahasiswa\DataDiriController;
use App\Http\Controllers\Mahasiswa\PendadaranController;
use App\Http\Controllers\Mahasiswa\Proposal\ProposalTugasAkhirController;
use App\Http\Controllers\Superadmin\RoleController;
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

// Daftar Judul Tugas Akhir
Route::get('skripsi', [JudulTugasAkhirController::class, 'index'])->name('judul-ta.index');

// Add Email
Route::get('/add-email', [AddEmailController::class, 'index'])->name('add-email');
Route::post('/add-email', [AddEmailController::class, 'store'])->name('add-email.store');

// Update Password
Route::get('/rubah-password', [ResetPasswordController::class, 'index'])->name('user-change-password');
Route::patch('/rubah-password', [ResetPasswordController::class, 'update'])->name('user-change-password.update');

// Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('role', RoleController::class)->except('show', 'edit', 'update');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::prefix('dosen')->group(function () {
        Route::get('bimbingan', [DataDosenController::class, 'index'])->name('dosen-bimbingan.index');
    });
});


Route::middleware(['auth', 'verified', 'role:admin|prodi|staff|superadmin'])->group(function () {
    // Users
    Route::resource('users', UserController::class)->except('show', 'edit', 'update');
    Route::get('datauser', DataUserController::class)->name('datauser');
    // Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class)->except('show', 'create', 'update', 'destroy', 'edit',);
    Route::get('datamahasiswa', DataMahasiswaController::class)->name('datamahasiswa');
    // Dosen
    Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('dosen', [DosenController::class, 'store'])->name('dosen.store');

    // Data Mahasiswa
    Route::get('data-mahasiswa', [BiodataController::class, 'index'])->name('data-mahasiswa.index');
    Route::post('data-mahasiswa', [BiodataController::class, 'store'])->name('data-mahasiswa.store');
    Route::delete('data-mahasiswa/{id}', [BiodataController::class, 'destroy'])->name('data-mahasiswa.destroy');
    Route::get('getdata-mahasiswa', BiodataMahasiswaController::class)->name('getdata-mahasiswa');
    // Data Proposal Tugas Akhir
    Route::resource('data-proposal', ProposalController::class)->except('create', 'store', 'destroy');
    Route::get('getdata-proposal', DataProposalController::class)->name('getdata-proposal');
    // Data Seminar Hasil
    Route::resource('data-seminar', DataSeminarController::class)->except('create', 'store', 'destroy');
    Route::get('data-seminarhasil', DataSeminarHasilController::class)->name('data-seminarhasil.index');
    // Data Pendadaran
    Route::resource('data-pendadaran', DataPendadaranController::class)->except('create', 'store', 'destroy');
    Route::get('getdata-pendadaran', GetDataPendadaranController::class)->name('getdata-pendadaran');
    // Data Pendadaran
    Route::resource('data-lulus', LulusController::class);
});

Route::middleware(['auth', 'verified', 'role:mahasiswa|superadmin'])->group(function () {
    // Data Diri
    Route::resource('data-diri', DataDiriController::class)->except('show', 'delete');
    Route::get('get-mahasiswa', DataController::class)->name('get-mahasiswa');
    // Proposal Tugas Akhir
    Route::resource('proposal', ProposalTugasAkhirController::class);
    // Seminar Hasil
    Route::resource('seminar-hasil', SeminarHasilController::class);
    // Pendadaran
    Route::resource('pendadaran', PendadaranController::class);
});
