@extends('layouts.appadmin')

@section('title', 'Pengaduan - Pengaduan Masyarakat')

@section('content')
    
    <h1 class="mb-3 text-center">Pengaduan - Pengaduan Masyarakat</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.pdf') }}" class="btn btn-primary mb-3"><span data-feather="download" style="width: 24px; height: 24px;"></span> Generate Laporan</a>

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
                    <a href="{{ route('admin.detailpengaduan', $pengaduan->id) }}" class="btn btn-info btn-sm">
                      <span data-feather="clipboard"></span> Detail 
                    </a>
                  </td>
              </tr>               
          @endforeach
        </tbody>
      </table>
    </div>
@endsection