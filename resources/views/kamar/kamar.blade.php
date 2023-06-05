@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Kamar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kamar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Kamar</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <a href="{{ route('kamar.create') }}">
                        <button class="btn btn-primary mb-3">Tambah Data</button>
                    </a>
                    <a href="{{ url('print-kamar') }}"target='_blank'>
                        <button class="btn btn-primary mb-3">Cetak Data</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>No Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Pegawai</th>
                                    <th>Kapasitas</th>
                                    <th>Fasilitas</th>
                                    <th>Kondisi</th>
                                    <th>Tarif Kamar</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
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
                                            <form action="{{ route('kamar.destroy', $dok->ID_KAMAR) }}"
                                                method="POST">
                                                <a href="{{ route('kamar.edit', $dok->ID_KAMAR) }}"
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
                        {!! $kamar->links('vendor.pagination.bootstrap-4') !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
