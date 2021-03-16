@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-3">Halo {{ Auth()->guard('masyarakat')->user()->nama }}</h1>

    <p class="fs-4">APPEM (Aplikasi Pengaduan Masyarakat) Perumahan Alam Tirta Lestari RT 03/14 adalah aplikasi pelaporan dan saran berbasis web yang akan memudahkan warga lokal untuk mengadukan keluhan ataupun memberi saran untuk RT 03 agar menjadi lebih baik.</p>
@endsection