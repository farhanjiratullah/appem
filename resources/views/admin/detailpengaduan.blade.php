@extends('layouts.appadmin')

@section('title', 'Detail Pengaduan')

@section('content')
    <h1 class="mb-3">Detail Pengaduan</h1>

    <a href="{{ route('admin.detailpdf', $data_pengaduan->id) }}" class="btn btn-primary mb-3" target="_blank"><span data-feather="download" style="width: 24px; height: 24px;"></span> Generate Laporan</a>

    <div class="card mb-3" style="width: 24rem;">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="/admin/pengaduan">
                    <span data-feather="arrow-left-circle" style="width: 32px; height: 32px;"></span>
                </a>
                <h4 class="fw-bold" style="color: #177F4F;">
                    @if( $data_pengaduan->status == 'proses')
                        <span data-feather="check" style="width: 32px; height: 32px;"></span> 
                        Divalidasi
                    @elseif( $data_pengaduan->status == 'selesai')
                        <span data-feather="check-circle" style="width: 32px; height: 32px;"></span> 
                        Diverifikasi
                    @else
                        Belum divalidasi
                    @endif
                </h4>
            </div>
        </div>
        <img src="/img/{{ $data_pengaduan->foto }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $data_pengaduan->tanggal_pengaduan }}</h5>
            <p class="card-text">{{ $data_pengaduan->isi_laporan }}</p>
            <hr>
            <p class="small">Diadukan oleh: {{ $data_pengaduan->masyarakat->nama }}</p>
            <p class="small">NIK: {{ $data_pengaduan->masyarakat->nik }}</p>
        </div>
    </div>

    <div class="card mb-3" style="width: 24rem;">
        <div class="card-header">
            <h4>Tanggapan</h4>
        </div>
        <div class="card-body">
            <p>{{ @$data_tanggapan->tanggapan }}</p>
        </div>
    </div>
@endsection