<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\OnlyMemberMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->middleware([OnlyGuestMiddleware::class])->name('login');
    Route::post('/', 'doLogin')->middleware([OnlyGuestMiddleware::class])->name('index');
    Route::get('/logout', 'logout')->middleware([OnlyMemberMiddleware::class])->name('logout');
});

Route::controller(StaffController::class)->group(function () {
    Route::middleware([OnlyMemberMiddleware::class])->prefix('/tatausaha')->group(function () {
        Route::get('/', 'index')->name('staff index');
        Route::get('/inbox', 'inbox')->name('staff inbox');
        Route::get('/pending', 'pending')->name('staff pending');
        Route::get('/reject', 'reject')->name('staff reject');
        Route::get('/preview/{id}', 'preview')->name('staff review');
        Route::post('/preview/{id}', 'proses')->name('staff proses');
    });
});


Route::controller(UserController::class)->group(function () {
   
    Route::middleware([OnlyMemberMiddleware::class])->prefix('/user')->group(function () {
        Route::get('', 'index')->name('user index');
        Route::get('/profile/edit', 'editProfile')->name('editProfile');
        Route::post('/profile/edit', 'doEditProfile')->name('doEditProfile');
        Route::get('/request','requestPostpone')->name('meminta surat perjanjian penundaan');
        Route::post('/request','doRequestPostpone')->name('proses meminta surat perjanjian penundaan');
        Route::get('/requestPostone','requestPostponeAgree')->name('requestPostponeAgreementAgree');
        Route::post('/requestPostone','doRequestPostponeAgree')->name('doRequestPostponeAgreementAgree');
        Route::get('/add', 'add')->name('ajukan surat');
        Route::post('/add', 'doAdd')->name('proses pengajuan surat');
        Route::get('/inbox', 'inbox')->name('user inbox');
        Route::get('/pending', 'pending')->name('user pending');
        Route::get('/reject', 'reject')->name('user reject');
        Route::get('/preview/{id}', 'preview')->name('user review');
        Route::post('/preview/{id}', 'proses')->name('user proses');
        Route::get('/show-pdf/{id}', 'showPDF')->name('show-pdf');
        Route::get('/pencairan/{id}', 'pencairan')->name('user pencairan dana');
        Route::post('/pencairan/{id}', 'pencairanProses')->name('user pencairan dana proses');
        Route::get('/pencairan-proses/{id}', 'konfirmasiPencairan')->name('user konfirmasi pencairan dana');
        Route::post('/pencairan-proses/{id}', 'konfirmasiPencairanProses')->name('user konfirmasi proses pencairan dana');
        Route::get('/list-pencairan', 'listPencairan')->name('list pencairan dana');
        Route::get('/laporan', 'laporan')->name('ajukan laporan');
        Route::post('/laporan', 'doLaporan')->name('proses laporan surat');
        Route::get('/laporan/approve', 'laporanDisetujui')->name('laporan disetujui');
        Route::get('/laporan/reject', 'laporanDitolak')->name('laporan ditolak');
        Route::get('/permintaan', 'permintaan')->name('ajukan permintaan uang muka');
        Route::post('/permintaan', 'doPermintaan')->name('proses permintaan uang muka');
        Route::get('/cetak_pdf','doCetak_PDF')->name('cetak_pdf');
        Route::get('/preview_pdf','previewPDF')->name('preview_pdf');
    });
});
