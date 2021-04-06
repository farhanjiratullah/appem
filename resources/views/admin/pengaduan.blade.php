@extends('layouts.appadmin')

@section('title', 'Pengaduan - Pengaduan Masyarakat')

@section('content')
    
    <h1 class="mb-3 text-center">Pengaduan - Pengaduan Masyarakat</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.pdf') }}" class="btn btn-primary mb-3" target="_blank"><span data-feather="download" style="width: 24px; height: 24px;"></span> Generate Laporan</a>

    <form action="{{ url()->current() }}">
      <div class="col-md-6">
          {{-- <input type="text" name="keyword" class="form-control" placeholder="Cari pengaduan..."> --}}
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari pengaduan.." aria-label="Cari pengaduan..." aria-describedby="button-addon2" name="keyword">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
          </div>
      </div>
    </form>

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
          @foreach ($search as $s)
              <tr class="text-center">
                  <td>{{ ($search->currentpage()-1) * $search->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $s->tanggal_pengaduan }}</td>
                  <td>{{ $s->masyarakat->nik }}</td>
                  <td>{{ $s->masyarakat->nama }}</td>
                  <td>{{ $s->status }}</td>
                  <td>
                    <a href="{{ route('admin.detailpengaduan', $s->id) }}" class="btn btn-info btn-sm">
                      <span data-feather="clipboard"></span> Detail 
                    </a>
                  </td>
              </tr>               
          @endforeach
        </tbody>
      </table>
      @if( $search->count() < 1 )
        <p class="text-center">Tidak ada pengaduan</p>
      @endif
      {{ $search->links() }}
    </div>
@endsection