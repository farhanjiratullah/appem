@extends('layouts.apppetugas')

@section('title', 'Detail Pengaduan')

@section('content')
    <h1 class="mb-3">Detail Pengaduan</h1>

    <div style="width: 24rem;">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="card mb-3" style="width: 24rem;">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="/petugas/pengaduan">
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
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <form action="{{ route('petugas.statusOnChange', $data_pengaduan->id) }}" method="post">
                    @csrf
                    <select name="status" class="form-select w-100" onchange="javascript:this.form.submit()">   
                        @if( $data_pengaduan->status == 'selesai' )
                            <option value="selesai" selected>Verifikasi</option>                            
                        @else
                            <option value="0" @if ($data_pengaduan->status == 0) selected @endif>Belum divalidasi</option>
                            <option value="proses" @if ($data_pengaduan->status == 'proses') selected @endif>Validasi</option>
                            <option value="selesai" class="d-none">Verifikasi</option>
                        @endif
                        
                        {{-- <option value="0" @if ($data_pengaduan->status == 0) selected @endif>Belum divalidasi</option>
                        <option value="proses" @if ($data_pengaduan->status == 'proses') selected @endif>Validasi</option>
                        <option value="selesai" @if ($data_pengaduan->status == 'selesai') selected @endif>Verifikasi</option> --}}
                    </select>
                </form>

                @if( $data_pengaduan->status == 'proses' )
                    <a href="/petugas/pengaduan/{{ $data_pengaduan->id }}/tanggapi" class="btn btn-primary">Tanggapi</a>
                @else
                    <a href="/petugas/pengaduan/{{ $data_pengaduan->id }}/tanggapi" class="btn btn-primary d-none">Tanggapi</a>
                @endif

            </div>
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