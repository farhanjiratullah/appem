<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Laporan</title>
</head>
<body>   
    <center>
        <h1>Laporan Pengaduan Masyarakat</h1>
        <table border="1" cellpadding="15" cellspacing="0">
            <thead>
                <tr>
                <th>#</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK</th>
                <th>Nama Pelapor</th>
                <th>Isi Laporan</th>
                <th>Status Laporan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_pengaduan as $pengaduan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                        <td>{{ $pengaduan->masyarakat->nik }}</td>
                        <td>{{ $pengaduan->masyarakat->nama }}</td>
                        <td>{{ \Str::limit($pengaduan->isi_laporan, 30) }}</td>
                        <td>{{ $pengaduan->status }}</td>
                    </tr>               
                @endforeach
            </tbody>
        </table>  
    </center>
</body>
</html>