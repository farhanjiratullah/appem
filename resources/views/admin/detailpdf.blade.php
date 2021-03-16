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
        <h1>Laporan Pengaduan</h1>
        <h5>{{ $data_pengaduan->tanggal_pengaduan }}</h5>
        <img src="{{ public_path('img/' . $data_pengaduan->foto) }}">
    </center>

    <p>{{ $data_pengaduan->isi_laporan }}</p>
    <p>Diadukan oleh: {{ $data_pengaduan->masyarakat->nama }} | {{ $data_pengaduan->masyarakat->nik }} | {{ $data_pengaduan->masyarakat->telp }}</p>

    <hr>

    <center>
        <h1>Tanggapan</h1>
        <h5>{{ $data_tanggapan->tanggal_tanggapan }}</h5>
    </center>

    <p>{{ @$data_tanggapan->tanggapan }}</p>
        {{-- <h3>Oleh: {{ $data_pengaduan->masyarakat->nama }} ({{ $data_pengaduan->masyarakat->nik }}) pada {{ $data_pengaduan->tanggal_pengaduan }}</h3>
        <p>{{ $data_pengaduan->isi_laporan }}</p>
        <hr>
        <p>{{ @$data_tanggapan->tanggapan }}</p> --}}
    
</body>
</html>