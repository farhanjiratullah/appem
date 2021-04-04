@extends('layouts.appadmin')

@section('title', 'Akun Admin & Petugas')

@section('content')
    <h1 class="mb-3 text-center">Akun Admin & Petugas</h1>   

    <a href="/admin/akun-petugas/register" class="btn btn-primary mb-3"><span data-feather="user" style="width: 24px; height: 24px;"></span> Tambah Akun</a>

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
          @endforeach
        </tbody>
      </table>
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