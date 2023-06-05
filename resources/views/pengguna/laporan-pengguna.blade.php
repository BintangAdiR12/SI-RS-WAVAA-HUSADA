<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pengguna</title>
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
        <h5 class="mb-2">Laporan Pengguna</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>Password</th>
                <th>Hak Akses</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($pengguna as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_PENGGUNA }}</td>
                    <td>{{ $dok->USERNAME }}</td>
                    <td>{{ $dok->PASSWORD }}</td>
                    <td>{{ $dok->HAK_AKSES }}</td>
                    <td>
            @endforeach
        </tbody>
    </table>

</body>

</html>
