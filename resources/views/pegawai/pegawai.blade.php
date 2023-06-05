@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Pegawai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pegawai
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Pegawai</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <a href="{{ route('pegawai.create') }}">
                        <button class="btn btn-primary mb-3">Tambah Data</button>
                    </a>
                    <a href="{{ url('print-pegawai') }}"target='_blank'>
                        <button class="btn btn-primary mb-3">Cetak Data</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Nama Pegawai</th>
                                    <th>No Registrasi</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Jadwal Kerja</th>
                                    <th>Unit Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($pegawai as $dok)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $dok->NAMA_PENGGUNA }}</td>
                                        <td>{{ $dok->NAMA }}</td>
                                        <td>{{ $dok->NO_REGISTRASI }}</td>
                                        <td>{{ $dok->ALAMAT }}</td>
                                        <td>{{ $dok->NO_TELP }}</td>
                                        <td>{{ $dok->EMAIL }}</td>
                                        <td>{{ $dok->JADWAL_KERJA }}</td>
                                        <td>{{ $dok->UNIT_KERJA }}</td>
                                        <td>
                                            <form action="{{ route('pegawai.destroy', $dok->ID_PEGAWAI) }}"
                                                method="POST">
                                                <a href="{{ route('pegawai.edit', $dok->ID_PEGAWAI) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <button class="btn btn-info" type="button">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $pegawai->links('vendor.pagination.bootstrap-4') !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
