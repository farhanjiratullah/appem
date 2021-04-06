<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Masyarakat, Pengaduan, Petugas, Tanggapan};
use PDF;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $data_pengaduan = Pengaduan::get();
        $data_masyarakat = Masyarakat::get();
        $data_petugas = Petugas::get();
        return view('admin.index', compact('data_pengaduan', 'data_masyarakat', 'data_petugas'));
    }

    public function tampilPengaduan(Request $request) {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $search = Pengaduan::with('masyarakat')->when($request->keyword, function ($query) use ($request) {
            $query->where('masyarakat_nik', 'like', "%{$request->keyword}%")
                ->orWhere('status', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate($request->limit ? $request->limit : 10);
        
        // return $search;
        $search->appends($request->only('keyword', 'limit'));
        $data_pengaduan = Pengaduan::with('masyarakat')->get();

        return view('admin.pengaduan', compact('data_pengaduan', 'search'));
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
        $pdf = PDF::loadView('admin.pdf', compact('data_pengaduan'))->setPaper('a4', 'portrait');
        $file_name = 'laporan-pengaduan-masyarakat.pdf';
        
        return $pdf->stream($file_name);
    }

    public function detailpdf($id) {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query) {
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        $pdf = PDF::loadView('admin.detailpdf', compact('data_pengaduan', 'data_tanggapan'))->setPaper('a4', 'portrait');
        $file_name = 'detail-laporan-pengaduan-masyarakat.pdf';
        
        return $pdf->stream($file_name);
    }

    public function tampilAkun(Request $request) {
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        // $search = Petugas::when($request->keyword, function ($query) use ($request) {
        //     $query->where('nama_petugas', 'like', "%{$request->keyword}%");
        //         // ->orWhere('nama', 'like', "%{$request->keyword}%");
        // })->paginate($request->limit ? $request->limit : 10);
        $search = Petugas::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_petugas', 'like', "%{$request->keyword}%")
                ->orWhere('username', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate($request->limit ? $request->limit : 10);
        // $search = DB::table('petugas')->where('nama_petugas', 'like', "%{$request->keyword}%")->paginate(10);
        $search->appends($request->only('keyword', 'limit'));
        // return $search;
        // return $search;
        $data_akun = Petugas::get();

        return view('admin.akun', compact('data_akun', 'search'));
    }

    public function RegisterFormAdmin() {
        return view('admin.register');
    }

    public function RegisterAdmin(Request $request) {
        $data_petugas = new Petugas();

        $this->validate($request, [
            'nama_petugas' => 'required|min:4',
            'username' => 'required|min:4|unique:petugas',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required|digits_between:10,13',
            'level' => 'required'
        ]);

        $data_petugas->nama_petugas = request()->get('nama_petugas');
        $data_petugas->username = request()->get('username');
        $data_petugas->password = Hash::make(request()->get('password'));
        $data_petugas->telp = request()->get('telp');
        $data_petugas->level = request()->get('level');
        $data_petugas->save();

        Alert::success('Berhasil!', 'Sukses register akun petugas!');
        return redirect()->back();
    }

    public function destroyAkun($id) {
        $data_akun = Petugas::find($id);
        $data_akun->delete();
        Alert::success('Berhasil!', 'Data petugas berhasil dihapus!');
        return redirect()->back();
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

        return view('admin.akunmasyarakat', compact('data_akunMasyarakat', 'search'));
    }

    public function destroyAkunMasyarakat($nik) {
        $data_akunMasyarakat = Masyarakat::with('pengaduans')->find($nik);
        $data_akunMasyarakat->delete();
        Alert::success('Berhasil!', 'Data masyarakat berhasil dihapus!');
        return redirect()->back();
    }

    public function logout() {
        Auth()->guard('admin')->logout();
        Alert::success('Berhasil!', 'Anda telah logout!');
        return redirect()->to('/admin/login');
    }
}
