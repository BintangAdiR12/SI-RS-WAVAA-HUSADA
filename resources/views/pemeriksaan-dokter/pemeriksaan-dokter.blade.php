@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Tenaga Kesehatan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tenaga Kesehatan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Tenaga Kesehatan</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <a href="{{ route('pemeriksaan-dokter.create') }}">
                        <button class="btn btn-primary mb-3">Tambah Data</button>
                    </a>
                    <a href="{{ url('print-pemeriksaan-dokter') }}"target='_blank'>
                        <button class="btn btn-primary mb-3">Cetak Data</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($pemeriksaan as $dok)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $dok->NAMA_PASIEN }}</td>
                                        <td>{{ $dok->NAMA_DOKTER }}</td>
                                        <td>{{ $dok->TGL_PEMERIKSAAN }}</td>
                                        <td>{{ $dok->KELUHAN }}</td>
                                        <td>{{ $dok->DIAGNOSA }}</td>
                                        <td>{{ $dok->BIAYA }}</td>
                                        <td>
                                            <form action="{{ route('pemeriksaan-dokter.destroy', $dok->ID_PEMERIKSAAN) }}"
                                                method="POST">
                                                <a href="{{ route('pemeriksaan-dokter.edit', $dok->ID_PEMERIKSAAN) }}"
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
                        {!! $pemeriksaan->links('vendor.pagination.bootstrap-4') !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
