@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dokter
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Dokter</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <a href="{{ route('dokter.create') }}">
                        <button class="btn btn-primary mb-3">Tambah Data</button>
                    </a>
                    <a href="{{ url('print-dokter') }}"target='_blank'>
                        <button class="btn btn-primary mb-3">Cetak Data</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
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
                                    <th>Aksi</th>
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
                                            <form action="{{ route('dokter.destroy', $dok->ID_DOKTER) }}"
                                                method="POST">
                                                <a href="{{ route('dokter.edit', $dok->ID_DOKTER) }}"
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
                        {{-- {!! $dokter->links('vendor.pagination.bootstrap-4') !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
