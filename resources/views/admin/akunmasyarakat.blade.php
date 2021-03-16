@extends('layouts.appadmin')

@section('title', 'Akun Masyarakat')

@section('content')
    <h1 class="mb-3 text-center">Akun Masyarakat</h1>   

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
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data_akunMasyarakat as $akun)
              <tr class="text-center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $akun->nik }}</td>
                  <td>{{ $akun->nama }}</td>
                  <td>{{ $akun->username }}</td>
                  <td>{{ $akun->telp }}</td>
                  <td>
                    <a href="{{ route('admin.destroyakunmasyarakat', $akun->nik) }}" class="btn btn-danger btn-sm">
                        <span data-feather="trash"></span> Hapus 
                    </a>
                  </td>
              </tr>               
          @endforeach
        </tbody>
      </table>
    </div>
@endsection