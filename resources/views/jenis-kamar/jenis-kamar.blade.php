@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Jenis Kamar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Jenis Kamar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Jenis Kamar</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <a href="{{ route('jenis-kamar.create') }}">
                        <button class="btn btn-primary mb-3">Tambah Data</button>
                    </a>
                    <a href="{{ url('print-jenis-kamar') }}"target='_blank'>
                        <button class="btn btn-primary mb-3">Cetak Data</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Jenis Kamar</th>
                                    <th>No Kamar</th>
                                    <th>Deskripsi</th>
                                    <th>Fasilitas</th>
                                    <th>Kapasitas</th>
                                    <th>Tarif Kamar</th>
                                    <th>Ruang Asal Pasien</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($jkamar as $dok)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $dok->NAMA_JENIS_KAMAR }}</td>
                                        <td>{{ $dok->NO_KAMAR }}</td>
                                        <td>{{ $dok->DESKRIPSI }}</td>
                                        <td>{{ $dok->FASILITAS }}</td>
                                        <td>{{ $dok->KAPASITAS }}</td>
                                        <td>{{ $dok->TARIF_KAMAR }}</td>
                                        <td>{{ $dok->RUANG_ASAL_PASIEN }}</td>
                                        <td>
                                            <form action="{{ route('jenis-kamar.destroy', $dok->ID_JENIS_KAMAR) }}"
                                                method="POST">
                                                <a href="{{ route('jenis-kamar.edit', $dok->ID_JENIS_KAMAR) }}"
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
                        {!! $jkamar->links('vendor.pagination.bootstrap-4') !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
