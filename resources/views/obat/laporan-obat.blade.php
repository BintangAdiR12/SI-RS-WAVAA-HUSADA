<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Obat</title>
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
        <h5 class="mb-2">Laporan Obat</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Obat</th>
                <th>Nama Tenaga Kesehatan</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Ketersediaan</th>
                <th>Stok</th>
                <th>Kadaluarsa</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($obat as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_OBAT }}</td>
                    <td>{{ $dok->NAMA}}</td>
                    <td>{{ $dok->KATEGORI }}</td>
                    <td>{{ $dok->DESKRIPSI }}</td>
                    <td>{{ $dok->KETERSEDIAAN }}</td>
                    <td>{{ $dok->STOK }}</td>
                    <td>{{ $dok->KADALUARSA }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
