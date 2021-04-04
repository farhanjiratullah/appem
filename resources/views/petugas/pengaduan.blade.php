@extends('layouts.apppetugas')

@section('title', 'Pengaduan - Pengaduan Masyarakat')

@section('content')

    <h1 class="mb-4 text-center">Pengaduan - Pengaduan Masyarakat</h1>

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
                      <a href="{{ route('petugas.detailpengaduan', $pengaduan->id) }}" class="btn btn-info btn-sm">
                        <span data-feather="clipboard"></span> Detail 
                      </a>
                      <form action="{{ route('petugas.destroypengaduan', $pengaduan->id) }}" method="post" id="delete{{ $pengaduan->id }}" class="d-inline">
                        @csrf
                        @method('delete')

                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $pengaduan->id }})">
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

   function deleteData(id){
      Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus pengaduan ini?",
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