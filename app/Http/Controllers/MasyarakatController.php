<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pengaduan, Masyarakat, Tanggapan};

class MasyarakatController extends Controller
{
    public function index() {
        return view('index');
    }

    public function formPengaduan() {
        return view('form-pengaduan');
    }

    public function simpanPengaduan() {
        $data_pengaduan = Pengaduan::create(request()->all());
        return redirect()->to('/');
    }
}
