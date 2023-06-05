<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pemeriksaan Dokter</title>
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
        <h5 class="mb-2">Laporan Pemeriksaan Dokter</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
                <th>Biaya</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($pemeriksaan_dokter as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_PASIEN }}</td>
                    <td>{{ $dok->NAMA_DOKTER }}</td>
                    <td>{{ $dok->TGL_PEMERIKSAAN }}</td>
                    <td>{{ $dok->KELUHAN }}</td>
                    <td>{{ $dok->DIAGNOSA }}</td>
                    <td>{{ $dok->BIAYA }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
