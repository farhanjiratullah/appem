<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Masyarakat, Petugas};
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Register Masyarakat
    public function RegisterFormMasyarakat() {
        return view('auth.register');
    }

    public function RegisterMasyarakat(Request $request) {
        $data_masyarakat = new Masyarakat();

        $this->validate($request, [
            'nik' => 'required|digits:16|unique:masyarakats',
            'nama' => 'required|min:4',
            'username' => 'required|min:4|unique:masyarakats',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required|digits_between:10,13'
        ]);

        $data_masyarakat->nik = request()->get('nik');
        $data_masyarakat->nama = request()->get('nama');
        $data_masyarakat->username = request()->get('username');
        $data_masyarakat->password = Hash::make(request()->get('password'));
        $data_masyarakat->telp = request()->get('telp');
        $data_masyarakat->save();

        Alert::success('Berhasil!', 'Sukses Register Akun');
        return redirect()->to('/register');
    }

    // Register Admin & Petugas
    public function RegisterFormAdmin() {
        return view('admin.auth.register');
    }

    public function RegisterAdmin(Request $request) {
        $data_masyarakat = new Petugas();

        $this->validate($request, [
            'nama_petugas' => 'required|min:4',
            'username' => 'required|min:4:unique:petugas',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required|digits_between:10,13',
            'level' => 'required'
        ]);

        $data_masyarakat->nama_petugas = request()->get('nama_petugas');
        $data_masyarakat->username = request()->get('username');
        $data_masyarakat->password = bcrypt(request()->get('password'));
        $data_masyarakat->telp = request()->get('telp');
        $data_masyarakat->level = request()->get('level');
        $data_masyarakat->save();

        return redirect()->to('/admin/register')->with('success', 'Sukses register akun!');
    }
}
