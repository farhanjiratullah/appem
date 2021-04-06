@extends('layouts.appadmin')

@section('title', 'Akun Admin & Petugas')

@section('content')
    <h1 class="mb-3 text-center">Akun Admin & Petugas</h1>   

    <a href="/admin/akun-petugas/register" class="btn btn-primary mb-3"><span data-feather="user" style="width: 24px; height: 24px;"></span> Tambah Akun</a>

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
            <th>Aksi</th>
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
                  <td>
                    <form action="{{ route('admin.destroyakun', $s->id) }}" method="post" id="delete{{ $s->id }}">
                      @csrf
                      @method('delete')

                      @if( Auth()->guard('admin')->user()->id != $s->id )
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $s->id }})">
                          <span data-feather="trash"></span> Hapus 
                        </button>
                      @endif
                    </form>
                  </td>
              </tr>               
          @endforeach

          {{-- @foreach ($data_akun as $akun)
              <tr class="text-center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $akun->nama_petugas }}</td>
                  <td>{{ $akun->username }}</td>
                  <td>{{ $akun->telp }}</td>
                  <td>{{ $akun->level }}</td>
                  <td>
                    <form action="{{ route('admin.destroyakun', $akun->id) }}" method="post" id="delete{{ $akun->id }}">
                      @csrf
                      @method('delete')

                      @if( Auth()->guard('admin')->user()->id != $akun->id )
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $akun->id }})">
                          <span data-feather="trash"></span> Hapus 
                        </button>
                      @endif
                    </form>
                  </td>
              </tr>               
          @endforeach --}}
        </tbody>
      </table>
      @if( $search->count() < 1 )
        <p class="text-center">Tidak ada petugas</p>
      @endif
      {{ $search->links() }}
    </div>
@endsection

@section('sweet')

   function deleteData(id){
      Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus akun petugas?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.value) {
              $('#delete'+id).submit();
          }
        })
   }
   
@endsection