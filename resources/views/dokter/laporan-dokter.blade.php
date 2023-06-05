<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Dokter</title>
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
        <h5 class="mb-2">Laporan Data Dokter</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Pengguna</th>
                <th>Nama Dokter</th>
                <th>Spesialis</th>
                <th>No Registrasi</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Jadwal Kerja</th>
                <th>Tarif Konsultasi</th>
                <th>Riwayat Pendidikan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($dokter as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_PENGGUNA }}</td>
                    <td>{{ $dok->NAMA_DOKTER }}</td>
                    <td>{{ $dok->SPESIALIS }}</td>
                    <td>{{ $dok->NO_REGRISTASI	 }}</td>
                    <td>{{ $dok->ALAMAT }}</td>
                    <td>{{ $dok->NO_TELP }}</td>
                    <td>{{ $dok->EMAIL	 }}</td>
                    <td>{{ $dok->JADWAL_KERJA }}</td>
                    <td>{{ $dok->TARIF_KONSULTASI }}</td>
                    <td>{{ $dok->RIWAYAT_PENDIDIKAN }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
