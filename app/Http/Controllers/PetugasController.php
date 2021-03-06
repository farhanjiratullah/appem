<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengaduan, Masyarakat, Tanggapan, Petugas};
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function index() {
        $data_pengaduan = Pengaduan::get();
        $data_masyarakat = Masyarakat::get();
        $data_petugas = Petugas::get();
        return view('petugas.index', compact('data_pengaduan', 'data_masyarakat', 'data_petugas'));
    }

    public function tampilPengaduan(Request $request) {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $search = Pengaduan::with('masyarakat')->when($request->keyword, function ($query) use ($request) {
            $query->where('masyarakat_nik', 'like', "%{$request->keyword}%")
                ->orWhere('status', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate($request->limit ? $request->limit : 10);
        $search->appends($request->only('keyword', 'limit'));
        $data_pengaduan = Pengaduan::with('masyarakat')->get();

        return view('petugas.pengaduan', compact('data_pengaduan', 'search'));
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
        Alert::success('Berhasil!', 'Data pengaduan berhasil dihapus!');
        return redirect()->back();
    }

    public function statusOnChange($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->status = request()->get('status');
        $data_pengaduan->save();
        return redirect()->back();
    }

    public function tampilAkun(Request $request) {
        $this->validate($request, [
            'limit' => 'integer',
        ]);
        
        $search = Petugas::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_petugas', 'like', "%{$request->keyword}%")
                ->orWhere('username', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate($request->limit ? $request->limit : 10);
        $search->appends($request->only('keyword', 'limit'));
        $data_akun = Petugas::get();

        return view('petugas.akun', compact('data_akun', 'search'));
    }

    public function tampilAkunMasyarakat(Request $request) {
        $this->validate($request, [
            'limit' => 'integer',
        ]);
        $search = Masyarakat::when($request->keyword, function ($query) use ($request) {
            $query->where('nik', 'like', "%{$request->keyword}%")
                ->orWhere('username', 'like', "%{$request->keyword}%");
        })->orderBy('nik', 'desc')->paginate($request->limit ? $request->limit : 10);
        $search->appends($request->only('keyword', 'limit'));
        $data_akunMasyarakat = Masyarakat::get();

        return view('petugas.akunmasyarakat', compact('data_akunMasyarakat', 'search'));
    }

    public function destroyAkunMasyarakat($nik) {
        $data_akunMasyarakat = Masyarakat::with('pengaduans')->find($nik);
        $data_akunMasyarakat->delete();
        Alert::success('Berhasil', 'Data Masyarakat berhasil dihapus!');
        return redirect()->back();
    }

    public function logout() {
        Auth()->guard('petugas')->logout();
        Alert::success('Berhasil', 'Anda telah logout!');
        return redirect()->to('/petugas/login');
    }
}
