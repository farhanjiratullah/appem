<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengaduan, Masyarakat, Tanggapan, Petugas};

class PetugasController extends Controller
{
    public function index() {
        $data_pengaduan = Pengaduan::get();
        $data_masyarakat = Masyarakat::get();
        return view('petugas.index', compact('data_pengaduan', 'data_masyarakat'));
    }

    public function tampilPengaduan() {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        return view('petugas.pengaduan', compact('data_pengaduan'));
    }

    public function detailPengaduan($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query) {
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('petugas.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }

    public function destroyPengaduan($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->delete();
        return redirect()->back()->with('success', 'Data pengaduan berhasil dihapus!');
    }

    public function statusOnChange($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->status = request()->get('status');
        $data_pengaduan->save();
        return redirect()->back();
    }

    public function tampilAkun() {
        $data_akun = Petugas::get();
        return view('petugas.akun', compact('data_akun'));
    }

    public function tampilAkunMasyarakat() {
        $data_akunMasyarakat = Masyarakat::get();
        return view('petugas.akunmasyarakat', compact('data_akunMasyarakat'));
    }

    public function destroyAkunMasyarakat($nik) {
        $data_akunMasyarakat = Masyarakat::find($nik);
        $data_akunMasyarakat->delete();
        return redirect()->back()->with('success', 'Data Masyarakat berhasil dihapus!');
    }

    public function logout() {
        Auth()->guard('petugas')->logout();
        return redirect()->to('/petugas/login');
    }
}