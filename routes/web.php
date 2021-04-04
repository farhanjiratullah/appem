<?php

use Illuminate\Support\Facades\Route;
// use RealRashid\

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
// Route::get('/register', function() {
//     Alert::success('berhasil');
// });
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
    Route::get('/buat-laporan', 'MasyarakatController@formPengaduan');
    Route::post('/buat-laporan/simpan', 'MasyarakatController@simpanPengaduan')->name('masyarakat.pengaduan');
    Route::get('/laporanku', 'MasyarakatController@laporanku');
    Route::get('/laporanku/{id}', 'MasyarakatController@detailLaporanku');
    Route::get('/logout', 'MasyarakatController@logout');
});

// Middleware petugas
Route::middleware('petugas')->group(function() {
    Route::resource('petugas', 'PetugasController')->except('show');
    Route::get('/petugas/pengaduan', 'PetugasController@tampilPengaduan');
    Route::get('/petugas/pengaduan/{id}', 'PetugasController@detailPengaduan')->name('petugas.detailpengaduan');
    Route::delete('/petugas/pengaduan/{id}/destroy-pengaduan', 'PetugasController@destroyPengaduan')->name('petugas.destroypengaduan');
    Route::get('/petugas/pengaduan/{id}/tanggapi', 'TanggapanController@formTanggapan');
    Route::post('/petugas/pengaduan/{id}/tanggapi', 'TanggapanController@storeTanggapan')->name('petugas.tanggapi');
    Route::post('/petugas/pengaduan/{id}/onchange', 'PetugasController@statusOnChange')->name('petugas.statusOnChange');
    Route::get('/petugas/akun-petugas', 'PetugasController@tampilAkun');
    Route::get('/petugas/akun-masyarakat', 'PetugasController@tampilAkunMasyarakat');
    Route::delete('/petugas/akun-masyarakat/{nik}/destroy-masyarakat', 'PetugasController@destroyAkunMasyarakat')->name('petugas.destroyakunmasyarakat');
    Route::get('/petugas/logout', 'PetugasController@logout');
});

// Middleware admin
Route::middleware('admin')->group(function() {
    Route::resource('admin', 'AdminController')->except('show');
    Route::get('/admin/pengaduan', 'AdminController@tampilPengaduan');
    Route::get('/admin/pengaduan/{id}', 'AdminController@detailPengaduan')->name('admin.detailpengaduan');
    Route::get('/admin/pengaduans/pdf', 'AdminController@cetakpdf')->name('admin.pdf');
    Route::get('/admin/pengaduans/{id}/pdf', 'AdminController@detailpdf')->name('admin.detailpdf');
    Route::get('admin/akun-petugas', 'AdminController@tampilAkun');
    Route::get('/admin/akun-petugas/register', 'AdminController@registerFormAdmin');
    Route::post('/admin/akun-petugas/register/store', 'AdminController@registerAdmin')->name('admin.register');
    Route::delete('/admin/akun-petugas/{id}/destroy-akun-petugas', 'AdminController@destroyAkun')->name('admin.destroyakun');
    Route::get('/admin/akun-masyarakat', 'AdminController@tampilAkunMasyarakat');
    Route::delete('/admin/akun-masyarakat/{nik}/destroy-masyarakat', 'AdminController@destroyAkunMasyarakat')->name('admin.destroyakunmasyarakat');
    Route::get('/admin/logout', 'AdminController@logout');
});