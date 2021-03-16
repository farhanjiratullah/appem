@extends('layouts.apppetugas')

@section('title', 'Pengaduan - Pengaduan Masyarakat')

@section('content')

    <h1 class="mb-4 text-center">Pengaduan - Pengaduan Masyarakat</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Tanggal Pengaduan</th>
              <th>NIK</th>
              <th>Nama Pelapor</th>
              <th>Status Laporan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data_pengaduan as $pengaduan)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                    <td>{{ $pengaduan->masyarakat->nik }}</td>
                    <td>{{ $pengaduan->masyarakat->nama }}</td>
                    <td>{{ $pengaduan->status }}</td>
                    <td>
                      <a href="{{ route('petugas.detailpengaduan', $pengaduan->id) }}" class="btn btn-info btn-sm">
                        <span data-feather="clipboard"></span> Detail 
                      </a>
                      <a href="{{ route('petugas.destroypengaduan', $pengaduan->id) }}" class="btn btn-danger btn-sm">
                        <span data-feather="trash"></span> Hapus 
                      </a>
                    </td>
                </tr>               
            @endforeach
          </tbody>
        </table>
      </div>
@endsection