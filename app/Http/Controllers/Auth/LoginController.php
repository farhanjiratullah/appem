<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                return redirect()->to('/petugas/login');
            }
        } else {
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
                return redirect()->to('/admin/login');
            }
        } else {
            return redirect()->to('/admin/login');
        }
    }
}
