@extends('layouts.apppetugas')

@section('title', 'Akun Admin & Petugas')

@section('content')
    <h1 class="mb-3 text-center">Akun Admin & Petugas</h1>   

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
              </tr>               
          @endforeach
        </tbody>
      </table>
    </div>
@endsection