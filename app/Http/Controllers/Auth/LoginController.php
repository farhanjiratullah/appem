<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\{Masyarakat, Petugas};

class LoginController extends Controller
{
    // login masyarakat
    public function FormLoginMasyarakat() {
        return view('auth.login');
    }

    public function LoginMasyarakat() {
        $auth = request()->only('username', 'password');

        if( Auth()->guard('masyarakat')->attempt($auth) ) {
            return redirect()->to('/');
        } else {
            Alert::error('Gagal!', 'Username atau Password anda salah!');
            return redirect()->to('/login');
        }
    }

    // login petugas
    public function FormLoginPetugas() {
        return view('petugas.auth.login');
    }

    public function LoginPetugas() {
        $auth = request()->only('username', 'password');

        if( Auth()->guard('petugas')->attempt($auth) ) {
            if( Auth()->guard('petugas')->user()->level == 'petugas' ) {
                return redirect()->to('/petugas');
            } else {
                Alert::error('Gagal!', 'Anda bukan petugas!');
                return redirect()->to('/petugas/login');
            }
        } else {
            Alert::error('Gagal!', 'Username atau Password anda salah!');
            return redirect()->to('/petugas/login');
        }
    }

    // login admin
    public function FormLoginAdmin() {
        return view('admin.auth.login');
    }

    public function LoginAdmin() {
        $auth = request()->only('username', 'password');

        if( Auth()->guard('admin')->attempt($auth) ) {
            if( Auth()->guard('admin')->user()->level == 'admin' ) {
                return redirect()->to('/admin');
            } else {
                Alert::error('Gagal!', 'Anda bukan admin!');
                return redirect()->to('/admin/login');
            }
        } else {
            Alert::error('Gagal!', 'Username atau Password anda salah!');
            return redirect()->to('/admin/login');
        }
    }
}
