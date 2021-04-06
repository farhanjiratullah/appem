@extends('layouts.apppetugas')

@section('title', 'Akun Admin & Petugas')

@section('content')
    <h1 class="mb-3 text-center">Akun Admin & Petugas</h1>   

    <form action="{{ url()->current() }}" method="get">
      <div class="row">
        <div class="col-md-6">
            {{-- <input type="text" name="keyword" class="form-control" placeholder="Cari petugas..."> --}}
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari petugas.." aria-label="Cari petugas..." aria-describedby="button-addon2" name="keyword" value="{{ old('search') }}">
              <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
            </div>
        </div>
      </div>
    </form>

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
          @foreach ($search as $s)
              <tr class="text-center">
                <td>{{ ($search->currentpage()-1) * $search->perpage() + $loop->index + 1 }}</td>
                <td>{{ $s->nama_petugas }}</td>
                <td>{{ $s->username }}</td>
                <td>{{ $s->telp }}</td>
                <td>{{ $s->level }}</td>
              </tr>               
          @endforeach
        </tbody>
      </table>
      @if( $search->count() < 1 )
        <p class="text-center">Tidak ada petugas</p>
      @endif
      {{ $search->links() }}
    </div>
@endsection