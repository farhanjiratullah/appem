@extends('layouts.app')

@section('title', 'Laporanku')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-3">Laporanku</h1>

            @foreach ($data_pengaduan as $pengaduan)                
                <div class="col-md-6">
                    {{-- <a href="/laporanku/detaillaporanku/{{ $pengaduan->id }}" class="text-decoration-none"> --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 style="color: black;">{{ $pengaduan->tanggal_pengaduan }}</h4>
                                    <h4 class="fw-bold" style="color: #177F4F;">
                                        @if( $pengaduan->status == 'proses')
                                            <span data-feather="check" style="width: 32px; height: 32px;"></span> 
                                            Divalidasi
                                        @elseif( $pengaduan->status == 'selesai')
                                            <span data-feather="check-circle" style="width: 32px; height: 32px;"></span> 
                                            Diverifikasi
                                        @else
                                            Belum divalidasi
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">                          
                                <p class="card-text" style="color: black;">{{ $pengaduan->isi_laporan }}</p>
                                <a href="/laporanku/{{ $pengaduan->id }}" class="btn btn-info btn-sm">Detail</a>
                            </div>
                        </div>  
                    {{-- </a>              --}}
                </div>               
            @endforeach
        </div>
    </div>
@endsection