<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Pembayaran</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Pegawai</th>
                <th>Nama Pasien</th>
                <th>No Kamar</th>
                <th>Nama Dokter</th>
                <th>Keluhan</th>
                <th>Jenis Perawatan</th>
                <th>Nama Obat</th>
                <th>Nama Tenaga Kesehatan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($pembayaran as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_PEGAWAI }}</td>
                    <td>{{ $dok->NAMA_PASIEN }}</td>
                    <td>{{ $dok->NO_KAMAR }}</td>
                    <td>{{ $dok->NAMA_DOKTER }}</td>
                    <td>{{ $dok->KELUHAN }}</td>
                    <td>{{ $dok->NAMA_JENIS }}</td>
                    <td>{{ $dok->NAMA_OBAT }}</td>
                    <td>{{ $dok->NAMA_TENKES }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
