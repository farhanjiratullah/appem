@extends('layouts.app')

@section('title', 'Form Pengaduan')

@section('content')
<main class="form-signin">
    <div class="col-md-6">
    <form action="{{ route('masyarakat.pengaduan') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="h3 mb-3 fw-normal">Buat Laporan</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <input type="hidden" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control {{ $errors->has('tanggal_pengaduan') ? 'is-invalid' : '' }} mb-3" placeholder="Tanggal Pengaduan" value="{{ Carbon\Carbon::now('+07:00') }}">

        <label for="isi_laporan" class="form-label">Isi Laporan</label>
        <textarea name="isi_laporan" id="isi_laporan" class="form-control {{ $errors->has('isi_laporan') ? 'is-invalid' : '' }} mb-3" placeholder="Isi Laporan" required rows="5">{{ old('isi_laporan') }}</textarea>
        @if ($errors->has('isi_laporan'))
        <div class="invalid-feedback">
            {{ $errors->first('isi_laporan') }}
        </div>
        @endif
    
        <label for="foto" class="form-label">Foto</label>
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