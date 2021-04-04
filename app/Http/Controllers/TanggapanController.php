<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengaduan, Masyarakat, Tanggapan};
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{
    public function formTanggapan($id) {
        $detail_pengaduan = Pengaduan::with('masyarakat')->find($id);
        // return $detail_pengaduan;
        return view('petugas.tanggapi', compact('detail_pengaduan'));
    }

    public function storeTanggapan($id) {       
        $data_tanggapan = new Tanggapan();
        $data_pengaduan = Pengaduan::find($id);

        $data_pengaduan->status = 'selesai';

        $data_tanggapan->tanggal_tanggapan = request()->get('tanggal_tanggapan');
        $data_tanggapan->pengaduan_id = request()->get('pengaduan_id');
        $data_tanggapan->tanggapan = request()->get('tanggapan');
        $data_tanggapan->petugas_id = Auth()->guard('petugas')->user()->id;
        $data_pengaduan->save();
        $data_tanggapan->save();

        Alert::success('Berhasil!', 'Pengaduan berhasil ditanggapi!');
        return redirect()->to('petugas/pengaduan/' . $data_pengaduan->id);
    }   
}
