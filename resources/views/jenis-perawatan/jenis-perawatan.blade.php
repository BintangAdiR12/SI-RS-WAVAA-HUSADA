@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Jenis Perawatan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Jenis Perawatan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Jenis Perawatan</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <a href="{{ route('jenis-perawatan.create') }}">
                        <button class="btn btn-primary mb-3">Tambah Data</button>
                    </a>
                    <a href="{{ url('print-jenis-perawatan') }}"target='_blank'>
                        <button class="btn btn-primary mb-3">Cetak Data</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Jenis</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama Tenaga Kesehatan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Harga</th>
                                    <th>Durasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($perawatan as $dok)
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
                                            <form action="{{ route('jenis-perawatan.destroy', $dok->ID_JENIS_PERAWATAN) }}"
                                                method="POST">
                                                <a href="{{ route('jenis-perawatan.edit', $dok->ID_JENIS_PERAWATAN) }}"
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
                        {!! $perawatan->links('vendor.pagination.bootstrap-4') !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
