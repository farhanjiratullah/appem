<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Register
Route::get('/register', 'Auth\\RegisterController@RegisterFormMasyarakat');
Route::post('/register/store', 'Auth\\RegisterController@RegisterMasyarakat')->name('masyarakat.register');
// Route::get('/admin/register', 'Auth\\RegisterController@RegisterFormAdmin');
// Route::post('/admin/register/store', 'Auth\\RegisterController@RegisterAdmin')->name('admin.register');

// Login
Route::get('login', 'Auth\\LoginController@FormLoginMasyarakat');
Route::post('login/post', 'Auth\\LoginController@LoginMasyarakat')->name('masyarakat.login');
Route::get('/petugas/login', 'Auth\\LoginController@FormLoginPetugas');
Route::post('petugas/login/post', 'Auth\\LoginController@LoginPetugas')->name('petugas.login');
Route::get('/admin/login', 'Auth\\LoginController@FormLoginAdmin');
Route::post('admin/login/post', 'Auth\\LoginController@LoginAdmin')->name('admin.login');

// Middleware masyarakat
Route::middleware('masyarakat')->group(function() {
    Route::get('/', 'MasyarakatController@index')->name('masyarakat.index');
    Route::get('/pengaduan', 'MasyarakatController@formPengaduan');
    Route::post('/pengaduan/simpan', 'MasyarakatController@simpanPengaduan')->name('masyarakat.pengaduan');
    Route::get('/laporanku', 'MasyarakatController@laporanku');
    Route::get('/laporanku/detaillaporanku/{id}', 'MasyarakatController@detailLaporanku');
    Route::get('/logout', 'MasyarakatController@logout');
});

// Middleware petugas
Route::middleware('petugas')->group(function() {
    Route::resource('petugas', 'PetugasController')->except('show');
    Route::get('/petugas/pengaduan', 'PetugasController@tampilPengaduan');
    Route::get('/petugas/pengaduan/{id}', 'PetugasController@detailPengaduan')->name('petugas.detailpengaduan');
    Route::get('/petugas/destroy/{id}', 'PetugasController@destroyPengaduan')->name('petugas.destroypengaduan');
    Route::get('/petugas/detailpengaduan/{id}/tanggapi', 'TanggapanController@formTanggapan');
    Route::post('/petugas/detailpengaduan/{id}/tanggapi', 'TanggapanController@storeTanggapan')->name('petugas.tanggapi');
    Route::post('/petugas/detailpengaduan/onchange/{id}', 'PetugasController@statusOnChange')->name('petugas.statusOnChange');
    Route::get('/petugas/akun', 'PetugasController@tampilAkun');
    Route::get('/petugas/akunMasyarakat', 'PetugasController@tampilAkunMasyarakat');
    Route::get('/petugas/destroyMasyarakat/{nik}', 'PetugasController@destroyAkunMasyarakat')->name('petugas.destroyakunmasyarakat');
    Route::get('/petugas/logout', 'PetugasController@logout');
});

// Middleware admin
Route::middleware('admin')->group(function() {
    Route::resource('admin', 'AdminController')->except('show');
    Route::get('/admin/pengaduan', 'AdminController@tampilPengaduan');
    Route::get('/admin/pengaduan/{id}', 'AdminController@detailPengaduan')->name('admin.detailpengaduan');
    Route::get('/admin/pengaduans/pdf', 'AdminController@cetakpdf')->name('admin.pdf');
    Route::get('/admin/pengaduans/pdf/{id}', 'AdminController@detailpdf')->name('admin.detailpdf');
    Route::get('admin/akun', 'AdminController@tampilAkun');
    Route::get('/admin/register', 'AdminController@registerFormAdmin');
    Route::post('/admin/register/store', 'AdminController@registerAdmin')->name('admin.register');
    Route::get('/admin/destroy/{id}', 'AdminController@destroyAkun')->name('admin.destroyakun');
    Route::get('/admin/akunMasyarakat', 'AdminController@tampilAkunMasyarakat');
    Route::get('/admin/destroyMasyarakat/{nik}', 'AdminController@destroyAkunMasyarakat')->name('admin.destroyakunmasyarakat');
    Route::get('/admin/logout', 'AdminController@logout');
});