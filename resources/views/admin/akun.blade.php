@extends('layouts.appadmin')

@section('title', 'Akun Admin & Petugas')

@section('content')
    <h1 class="mb-3 text-center">Akun Admin & Petugas</h1>   

    <a href="/admin/register" class="btn btn-primary mb-3"><span data-feather="user" style="width: 24px; height: 24px;"></span> Tambah Akun</a>

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
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data_akun as $akun)
              <tr class="text-center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $akun->nama_petugas }}</td>
                  <td>{{ $akun->username }}</td>
                  <td>{{ $akun->telp }}</td>
                  <td>{{ $akun->level }}</td>
                  <td>
                    <a href="{{ route('admin.destroyakun', $akun->id) }}" class="btn btn-danger btn-sm">
                      <span data-feather="trash"></span> Hapus 
                    </a>
                  </td>
              </tr>               
          @endforeach
        </tbody>
      </table>
    </div>
@endsection