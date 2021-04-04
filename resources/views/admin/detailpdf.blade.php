<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Laporan Pengaduan Masyarakat</title>
    <style>
        .page-break{
            page-break-after:always;
        }
        .text-center{
            text-align:center;
        }
        .text-header {
            font-size:0.9rem;
        }
        .size2 {
            font-size:1.4rem;
        }
        .border-bottom {
            border-bottom:1px black solid;
        }
        .border {
            border: 2px block solid;
        }
        .border-top {
            border-top:1px black solid;
        }
        .float-right {
            float:right;
        }
        .mt-4 {
            margin-top:4px;
        }
        .mx-1 {
            margin:1rem 0 1rem 0;
        }
        .mr-1 {
            margin-right:1rem;
        }
        .mt-1 {
            margin-top:1rem;
        }
        ml-2 {
            margin-left:2rem;
        }
        .ml-min-5 {
            margin-left:-5px;
        }
        .text-uppercase {
            font:uppercase;
        }
        .d1 {
            font-size:2rem;
        }
        .img {
            position:absolute;
        }
        .link {
            font-style:underline;
        }
        .text-desc {
            font-size:14px;
        }
        .text-bold {
            font-style:bold;
        }
        .underline {
            text-decoration:underline;
        }
        
        table {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";;
            color: black;
            background: white;
        }
        table th {
            border-bottom: 1px solid black;
            background: white;
            padding: 10px 20px;
        }  
        table tr {
            text-align: center;
            padding-left: 20px;
            border-bottom: 1px solid rgb(222,226,230);
        }
        table tr:nth-child(odd) {
            text-align: center;
            padding-left: 20px;
            background-color: #F2F2F2;
        }
        table td {
            padding: 10px 15px;
            border-bottom: 1px solid rgb(222,226,230);
        }
        .table-center {
            margin-left:auto;
            margin-right:auto;
        }
        .mb-1 {
            margin-bottom:1rem;
        }
    </style>
</head>
<body>   
    <!-- header -->
    <div class="text-center">
        <img src="{{ public_path('img/logo-desa_pagelaran.png') }}" class="img" width="90" style="margin-top: -30px;">
            <div style="margin-left: 2rem;">
                <span class="text-header text-bold text-danger">
                    PERUMAHAN ALAM TIRTA LESTARI <br>
                </span>
                <span class="text-desc">RT 03/14 Telepon 0812-1234-5678<br>Website <span class="underline">www.altari-rt0314.com</span> - Email <span class="underline">perumahan@altari-rt0314.net</span> <br> Desa Pagelaran Kec. Ciomas Kab. Bogor 16610 <br> </span>
            </div>    
        </div>
    <div>
    <!-- /header -->

    <hr class="border">

    <center>
        <div class="size2 text-center">Detail Laporan Pengaduan Masyarakat</div>
        <div class="text-header">{{ $data_pengaduan->tanggal_pengaduan }}</div>
        <br>
        <img src="{{ public_path('img/' . $data_pengaduan->foto) }}">
    </center>

    <p>{{ $data_pengaduan->isi_laporan }}</p>
    <p>Diadukan oleh: {{ $data_pengaduan->masyarakat->nama }} | {{ $data_pengaduan->masyarakat->nik }} | {{ $data_pengaduan->masyarakat->telp }}</p>

    <hr class="border">

    <center>
        <div class="size2 text-center">Tanggapan</div>
        <div class="text-header">{{ @$data_tanggapan->tanggal_tanggapan }}</div>
        <br>
    </center>

    <p>{{ @$data_tanggapan->tanggapan }}</p>
        {{-- <h3>Oleh: {{ $data_pengaduan->masyarakat->nama }} ({{ $data_pengaduan->masyarakat->nik }}) pada {{ $data_pengaduan->tanggal_pengaduan }}</h3>
        <p>{{ $data_pengaduan->isi_laporan }}</p>
        <hr>
        <p>{{ @$data_tanggapan->tanggapan }}</p> --}}
    
</body>
</html>