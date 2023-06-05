<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jenis Perawatan</title>
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
        <h5 class="mb-2">Laporan Jenis Perawatan</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Jenis</th>
                <th>Nama Dokter</th>
                <th>Nama Tenaga Kesehatan</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Durasi</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($jenis_perawatan as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_JENIS }}</td>
                    <td>{{ $dok->NAMA_DOKTER }}</td>
                    <td>{{ $dok->NAMA }}</td>
                    <td>{{ $dok->DESKRIPSI }}</td>
                    <td>{{ $dok->STATUS }}</td>
                    <td>{{ $dok->HARGA }}</td>
                    <td>{{ $dok->DURASI }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
