@extends('layouts.app')

@section('title', 'Detail Laporanku')

@section('content')
    <h1 class="mb-3">Detail Laporanku</h1>

    <div class="card mb-3" style="width: 24rem;">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="/laporanku">
                    <span data-feather="arrow-left-circle" style="width: 32px; height: 32px;"></span>
                </a>
                <h4>Tanggapan</h4>
            </div>
        </div>
        <div class="card-body">
            <p>{{ @$data_tanggapan->tanggapan }}</p>
        </div>
    </div>

    <div class="card mb-3" style="width: 24rem;">
        <div class="card-header">                
            <h4 class="fw-bold" style="color: #177F4F;">
                @if( $detail_laporanku->status == 'proses')
                    <span data-feather="check" style="width: 32px; height: 32px;"></span> 
                    Divalidasi
                @elseif( $detail_laporanku->status == 'selesai')
                    <span data-feather="check-circle" style="width: 32px; height: 32px;"></span> 
                    Diverifikasi
                @else
                    Belum divalidasi
                @endif
            </h4>
        </div>
        <img src="/img/{{ $detail_laporanku->foto }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $detail_laporanku->tanggal_pengaduan }}</h5>
            <p class="card-text">{{ $detail_laporanku->isi_laporan }}</p>
        </div>
    </div>

    
@endsection