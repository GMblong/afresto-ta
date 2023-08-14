<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Home Route
Route::get('/', [HomeController::class, 'index']);

// Guest Route
Route::prefix('guest')->controller(GuestController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('guest.dashboard');
});

// User Login
Route::post('/alumni-login', [HomeController::class, 'alumniLogin'])->name('alumni.login');

// Admin Route
Route::middleware(['auth', 'admin'])->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    Route::get('/daftar-alumni', 'alumni_list')->name('admin.alumni_list');
    Route::get('/edit-alumni/{id}', 'editAlumni')->name('admin.edit_alumni');
    Route::get('/create', 'create')->name('admin.alumni_create');
    Route::post('/alumni-store', 'alumniStore')->name('admin.alumni_store');
    Route::put('/update/{id}', 'updateAlumni')->name('admin.alumni_update');
    Route::get('/delete/{id}', 'alumniDelete')->name('admin.alumni_delete');
    Route::get('/download-data-alumni', 'alumniDownload')->name('admin.alumni_download');
    Route::post('/store', 'store')->name('admin.store');
    Route::get('/keterserapan-alumni', 'alumni_category')->name('admin.alumni_category');
    Route::get('/account', 'account')->name('admin.account');
    Route::get('/pemberitahuan', 'notification')->name('admin.notification');
    Route::get('/daftar-pengumuman', 'pengumuman')->name('admin.pengumuman');
    Route::get('/pengumuman/edit/{id}', 'pengumumanEdit')->name('admin.pengumuman_edit');
    Route::put('/pengumuman/update/{id}', 'pengumumanUpdate')->name('admin.pengumuman_update');
    Route::post('/buat-pengumuman', 'pengumumanCreate')->name('admin.pengumuman_create');
    Route::get('/input-loker', 'jobCreate')->name('admin.job_create');
    Route::get('/lowongan-pekerjaan/edit/{id}', 'jobEdit')->name('admin.job_edit');
    Route::post('/lowongan-pekerjaan/update/{id}', 'jobUpdate')->name('admin.job_update');
    Route::get('/lowongan-pekerjaan/delete/{id}', 'jobDelete')->name('admin.job_delete');
    Route::post('/loker-store', 'jobAdd')->name('admin.job_add');
    Route::get('/daftar-loker', 'lokerList')->name('admin.job_list');
    Route::get('/daftar-apply-kerja-alumni', 'alumniApply')->name('admin.alumni_apply');
    Route::put('/daftar-apply-kerja-alumni/update/{id}', 'verifJobs')->name('admin.verif_jobs');
    Route::post('/upload-data-alumni', 'uploadExcel')->name('admin.upload_excel');
});

// Alumni Route
Route::middleware(['auth', 'alumni'])->prefix('alumni')->controller(AlumniController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('alumni.dashboard');
    Route::get('/daftar-alumni', 'alumniList')->name('alumni.list');
    Route::get('/input-loker', 'input_loker')->name('alumni.input_loker');
    Route::get('/daftar-lowongan-kerja', 'loker_list')->name('alumni.loker_list');
    Route::get('/pengumuman', 'pengumuman')->name('alumni.pengumuman');
    Route::get('/create', 'create')->name('alumni.activity');
    Route::get('/account', 'account')->name('alumni.account');
    Route::post('/store', 'store')->name('alumni.store');
    Route::get('/delete/{id}', 'delete')->name('alumni.delete');
    Route::put('/update/{id}', 'editAlumni')->name('alumni.editAlumni');
    Route::post('/apply-jobs', 'applyJobs')->name('alumni.apply');
    Route::get('/cancel-apply/{id}', 'cancelApply')->name('alumni.cancel_apply');
});

// Pengumuman Route
Route::prefix('pengumuman')->controller(PengumumanController::class)->group(function () {
    Route::get('delete/{id}', 'delete')->name('pengumuman.delete');
});

// Jobs Route
Route::prefix('jobs')->controller(JobsController::class)->group(function () {
    Route::post('store', 'store')->name('jobs.store');
});

require __DIR__ . '/auth.php';
