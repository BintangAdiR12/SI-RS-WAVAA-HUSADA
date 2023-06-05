<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Kamar</title>
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
        <h5 class="mb-2">Laporan Kamar</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>No Kamar</th>
                <th>Tipe Kamar</th>
                <th>Nama Pasien</th>
                <th>Nama Pegawai</th>
                <th>Kapasitas</th>
                <th>Fasilitas</th>
                <th>Kondisi</th>
                <th>Tarif Kamar</th>
                <th>Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($kamar as $dok)
            <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NO_KAMAR }}</td>
                    <td>{{ $dok->TIPE_KAMAR }}</td>
                    <td>{{ $dok->NAMA_PASIEN }}</td>
                    <td>{{ $dok->NAMA_PEGAWAI }}</td>
                    <td>{{ $dok->KAPASITAS }}</td>
                    <td>{{ $dok->FASILITAS }}</td>
                    <td>{{ $dok->KONDISI }}</td>
                    <td>{{ $dok->TARIF_KAMAR }}</td>
                    <td>{{ $dok->KETERANGAN }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
