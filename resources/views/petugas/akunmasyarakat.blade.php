@extends('layouts.apppetugas')

@section('title', 'Akun Masyarakat')

@section('content')
    <h1 class="mb-3 text-center">Akun Masyarakat</h1>   

    <form action="{{ url()->current() }}" method="get">
      <div class="row">
        <div class="col-md-6">
            {{-- <input type="text" name="keyword" class="form-control" placeholder="Cari petugas..."> --}}
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari masyarakat.." aria-label="Cari masyarakat..." aria-describedby="button-addon2" name="keyword">
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
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($search as $s)
              <tr class="text-center">
                  <td>{{ ($search->currentpage()-1) * $search->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $s->nik }}</td>
                  <td>{{ $s->nama }}</td>
                  <td>{{ $s->username }}</td>
                  <td>{{ $s->telp }}</td>
                  <td>
                    <form action="{{ route('petugas.destroyakunmasyarakat', $s->nik) }}" method="post" id="delete{{ $s->nik }}">
                      @csrf
                      @method('delete')

                      <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $s->nik }})">
                          <span data-feather="trash"></span> Hapus 
                      </button>
                    </form>
                  </td>
              </tr>               
          @endforeach
        </tbody>
      </table>
      @if( $search->count() < 1 )
        <p class="text-center">Tidak ada masyarakat</p>
      @endif
      {{ $search->links() }}
    </div>
@endsection

@section('sweet')

   function deleteData(nik){
      Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus akun masyarakat?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.value) {
              $('#delete'+nik).submit();
          }
        })
   }
   
@endsection