@extends('layouts.apppetugas')

@section('title', 'Dashboard Petugas')

@section('content')
    <h1 class="mb-4">Halo {{ Auth()->guard('petugas')->user()->nama_petugas }}</h1>

    <div class="row">
        <div class="col-md-3">
            <a href="petugas/akun-masyarakat" style="text-decoration: none; color: inherit;">
                <div class="card mb-3 py-2" style="border-top-color: none; border-right-color: none; border-bottom-color: none; border-left-color: #0DCAF0; border-left-width: 3px;">
                    <div class="row g-0">
                        <div class="col-md">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="kiri">
                                    <h6 class="card-title" style="color: #0DCAF0;">Akun Masyarakat</h6>
                                    <p class="card-text fw-bold fs-4">{{ $data_masyarakat->count() }}</p>
                                </div>
                                <div class="kanan">
                                    <span data-feather="users" style="width: 40px; height: 40px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="petugas/akun-petugas" style="text-decoration: none; color: inherit;">
                <div class="card mb-3 py-2" style="border-top-color: none; border-right-color: none; border-bottom-color: none; border-left-color: #0DCAF0; border-left-width: 3px;">
                    <div class="row g-0">
                        <div class="col-md">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="kiri">
                                    <h6 class="card-title" style="color: #0DCAF0;">Akun petugas & Petugas</h6>
                                    <p class="card-text fw-bold fs-4">{{ $data_petugas->count() }}</p>
                                </div>
                                <div class="kanan">
                                    <span data-feather="users" style="width: 40px; height: 40px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="petugas/pengaduan" style="text-decoration: none; color: inherit;">
                <div class="card mb-3 py-2" style="border-top-color: none; border-right-color: none; border-bottom-color: none; border-left-color: #0D6EFD; border-left-width: 3px;">
                    <div class="row g-0">
                        <div class="col-md">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="kiri">
                                    <h6 class="card-title" style="color: #0D6EFD;">Total Pengaduan</h6>
                                    <p class="card-text fw-bold fs-4">{{ $data_pengaduan->count() }}</p>
                                </div>
                                <div class="kanan">
                                    <span data-feather="message-circle" style="width: 40px; height: 40px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="petugas/pengaduan?keyword=proses" style="text-decoration: none; color: inherit;">
                <div class="card mb-3 py-2" style="border-top-color: none; border-right-color: none; border-bottom-color: none; border-left-color: #198754; border-left-width: 3px;">
                    <div class="row g-0">
                        <div class="col-md">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="kiri">
                                    <h6 class="card-title" style="color: #198754;">Pengaduan Tervalidasi</h6>
                                    <p class="card-text fw-bold fs-4">{{ $data_pengaduan->where('status', 'proses')->count() }}</p>
                                </div>
                                <div class="kanan">
                                    <span data-feather="check" style="width: 40px; height: 40px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>              
    </div>

    <div class="row">

        <div class="col-md-3">
            <a href="petugas/pengaduan?keyword=selesai" style="text-decoration: none; color: inherit;">
                <div class="card mb-3 py-2" style="border-top-color: none; border-right-color: none; border-bottom-color: none; border-left-color: #198754; border-left-width: 3px;">
                    <div class="row g-0">
                        <div class="col-md">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="kiri">
                                    <h6 class="card-title" style="color: #198754;">Pengaduan Terverifikasi</h6>
                                    <p class="card-text fw-bold fs-4">{{ $data_pengaduan->where('status', 'selesai')->count() }}</p>
                                </div>
                                <div class="kanan">
                                    <span data-feather="check-circle" style="width: 40px; height: 40px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>      
    </div>
@endsection