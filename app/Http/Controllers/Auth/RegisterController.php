<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Masyarakat;

class RegisterController extends Controller
{
    public function RegisterFormMasyarakat() {
        return view('auth.register');
    }

    public function RegisterMasyarakat(Request $request) {
        $data_masyarakat = new Masyarakat();

        $this->validate($request, [
            'nik' => 'required|digits:16|unique:masyarakats',
            'nama' => 'required|min:4',
            'username' => 'required|min:4',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required|digits_between:10,13'
        ]);

        $data_masyarakat->nik = request()->get('nik');
        $data_masyarakat->nama = request()->get('nama');
        $data_masyarakat->username = request()->get('username');
        $data_masyarakat->password = bcrypt(request()->get('password'));
        $data_masyarakat->telp = request()->get('telp');
        $data_masyarakat->save();

        return redirect()->to('/register')->with('success', 'Data Masyarakat sukses ditambahkan!');
    }
}
