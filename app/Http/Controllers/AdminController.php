<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Masyarakat, Pengaduan, Petugas, Tanggapan};
use PDF;

class AdminController extends Controller
{
    public function index() {
        $data_pengaduan = Pengaduan::get();
        $data_masyarakat = Masyarakat::get();
        return view('admin.index', compact('data_pengaduan', 'data_masyarakat'));
    }

    public function tampilPengaduan() {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        return view('admin.pengaduan', compact('data_pengaduan'));
    }

    public function detailPengaduan($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query) {
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('admin.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }

    // cetak laporan
    public function cetakpdf() {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        $pdf = PDF::loadView('admin.pdf', compact('data_pengaduan'))->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }

    public function detailpdf($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query) {
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        $pdf = PDF::loadView('admin.detailpdf', compact('data_pengaduan', 'data_tanggapan'))->setPaper('a4', 'portrait');
        
        return $pdf->download();
    }

    public function tampilAkun() {
        $data_akun = Petugas::get();
        return view('admin.akun', compact('data_akun'));
    }

    public function RegisterFormAdmin() {
        return view('admin.register');
    }

    public function RegisterAdmin(Request $request) {
        $data_petugas = new Petugas();

        $this->validate($request, [
            'nama_petugas' => 'required|min:4',
            'username' => 'required|min:4:unique:petugas',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required|digits_between:10,13',
            'level' => 'required'
        ]);

        $data_petugas->nama_petugas = request()->get('nama_petugas');
        $data_petugas->username = request()->get('username');
        $data_petugas->password = bcrypt(request()->get('password'));
        $data_petugas->telp = request()->get('telp');
        $data_petugas->level = request()->get('level');
        $data_petugas->save();

        return redirect()->to('/admin/akun')->with('success', 'Sukses register akun!');
    }

    public function destroyAkun($id) {
        $data_akun = Petugas::find($id);
        $data_akun->delete();
        return redirect()->back()->with('success', 'Data petugas berhasil dihapus!');
    }

    public function tampilAkunMasyarakat() {
        $data_akunMasyarakat = Masyarakat::get();
        return view('admin.akunmasyarakat', compact('data_akunMasyarakat'));
    }

    public function destroyAkunMasyarakat($nik) {
        $data_akunMasyarakat = Masyarakat::find($nik);
        $data_akunMasyarakat->delete();
        return redirect()->back()->with('success', 'Data Masyarakat berhasil dihapus!');
    }

    public function logout() {
        Auth()->guard('admin')->logout();
        return redirect()->to('/admin/login');
    }
}
