@extends('layouts.appadmin')

@section('title', 'Akun Masyarakat')

@section('content')
    <h1 class="mb-3 text-center">Akun Masyarakat</h1>   

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
                    <form action="{{ route('admin.destroyakunmasyarakat', $akun->nik) }}" method="post" id="delete{{ $akun->nik }}">
                      @csrf
                      @method('delete')

                      <button type="button" href="" class="btn btn-danger btn-sm" onclick="deleteData({{ $akun->nik }})">
                          <span data-feather="trash"></span> Hapus 
                      </button>
                    </form>
                  </td>
              </tr>               
          @endforeach
        </tbody>
      </table>
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