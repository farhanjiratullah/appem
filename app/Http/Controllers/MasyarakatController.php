<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengaduan, Masyarakat, Tanggapan, Petugas};
use Image;
use File;
use Carbon\Carbon;

class MasyarakatController extends Controller
{
    public function index() {
        return view('index');
    }

    public function formPengaduan() {
        return view('form-pengaduan');
    }

    public function simpanPengaduan(Request $request) {
        $data_pengaduan = new Pengaduan();

        $this->validate($request, [
            'isi_laporan' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $foto = request()->file('foto');
        $filename = $foto->getClientOriginalName();

        $foto->move(public_path() . '/images/', $filename);
        $foto_compress = Image::make(public_path() . '/images/' . $filename);
        $foto_compress->fit(480, 240);
        $foto_compress->save(public_path('/img/' . $filename));
        unlink(public_path('/images/' . $filename));
        
        $data_pengaduan->tanggal_pengaduan = request()->get('tanggal_pengaduan');
        $data_pengaduan->masyarakat_nik = Auth()->guard('masyarakat')->user()->nik;
        $data_pengaduan->isi_laporan = request()->get('isi_laporan');
        $data_pengaduan->foto = $filename;
        $data_pengaduan->save();

        return redirect()->back()->with('success', 'Pengaduan berhasil dilaporkan');
    }

    public function laporanku() {
        $data_pengaduan = Auth()->guard('masyarakat')->user()->pengaduans;
        return view('laporanku', compact('data_pengaduan'));
    }

    public function detailLaporanku($id) {
        $detail_laporanku = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query) {
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('detaillaporanku', compact('detail_laporanku', 'data_tanggapan'));
    }

    public function logout() {
        Auth()->guard('masyarakat')->logout();
        return redirect()->to('/login');
    }
}
