@extends('layouts.app')

@section('title', 'Form Pengaduan')

@section('content')
<main class="form-signin">
    <div class="col-md-6">
    <form action="{{ route('masyarakat.pengaduan') }}" method="post">
        @csrf
        
        {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="h3 mb-3 fw-normal">Buat Laporan</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <label for="tanggal_pengaduan" class="visually-hidden">Tanggal Pengaduan</label>
        <input type="text" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control {{ $errors->has('tanggal_pengaduan') ? 'is-invalid' : '' }}" placeholder="Tanggal Pengaduan" value="{{ date('y-m-d') }}" required readonly>
        @if ($errors->has('tanggal_pengaduan'))
            <div class="invalid-feedback">
                {{ $errors->first('tanggal_pengaduan') }}
            </div>
        @endif
    
        <label for="masyarakat_nik" class="visually-hidden">Masyarakat NIK</label>
        <input type="text" name="masyarakat_nik" id="masyarakat_nik" class="form-control {{ $errors->has('masyarakat_nik') ? 'is-invalid' : '' }}" placeholder="Masyarakat NIK" value="{{ Auth()->guard('masyarakat')->user()->nik }}" required readonly>
        @if ($errors->has('masyarakat_nik'))
            <div class="invalid-feedback">
                {{ $errors->first('masyarakat_nik') }}
            </div>
        @endif

        <label for="isi_laporan" class="visually-hidden">Isi Laporan</label>
        <textarea type="text" name="isi_laporan" id="isi_laporan" class="form-control {{ $errors->has('isi_laporan') ? 'is-invalid' : '' }}" placeholder="Isi Laporan" required>{{ old('isi_laporan') }}</textarea>
        @if ($errors->has('isi_laporan'))
        <div class="invalid-feedback">
            {{ $errors->first('isi_laporan') }}
        </div>
        @endif
    
        <label for="foto" class="visually-hidden">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}" placeholder="Foto" required>
        @if ($errors->has('foto'))
        <div class="invalid-feedback">
            {{ $errors->first('foto') }}
        </div>
        @endif
    
        {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
    
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Laporkan</button>
      </form>
    </div>
</main>
@endsection