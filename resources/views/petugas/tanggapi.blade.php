@extends('layouts.apppetugas')

@section('title', 'Tanggapi Pengaduan')

@section('content')
    @if( $detail_pengaduan->status == 'selesai' )
        <a href="/petugas/pengaduan/{{ $detail_pengaduan->id }}">
            <span data-feather="arrow-left-circle" style="width: 32px; height: 32px;"></span>
        </a>
        <h1 class="d-inline">Pengaduan sudah ditanggapi</h1>
    @else 
        <div class="card mb-3" style="width: 24rem;">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="/petugas/pengaduan/{{ $detail_pengaduan->id }}">
                        <span data-feather="arrow-left-circle" style="width: 32px; height: 32px;"></span>
                    </a>
                    <h4>Tanggapi</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('petugas.tanggapi', $detail_pengaduan->id) }}" method="post">
                    @csrf

                    <input type="hidden" name="tanggal_tanggapan" value="{{ Carbon\Carbon::now('+07:00') }}">

                    <input type="hidden" name="pengaduan_id" value="{{ request()->route('id') }}">

                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control {{ $errors->has('tanggapan') ? 'is-invalid' : '' }} mb-3" placeholder="Tanggapi" required rows="5">{{ old('tanggapan') }}</textarea>
                    @if ($errors->has('tanggapan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggapan') }}
                    </div>
                    @endif

                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Tanggapi</button>
                </form>
            </div>
            {{-- <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <select name="status" class="form-select w-50">
                        <option value="0">Belum divalidasi</option>
                        <option value="proses">Validasi</option>
                        <option value="selesai">Verifikasi</option>
                    </select>
                    <a href="#" class="btn btn-primary">Tanggapi</a>
                </div>
            </div> --}}
        </div>
    @endif
@endsection