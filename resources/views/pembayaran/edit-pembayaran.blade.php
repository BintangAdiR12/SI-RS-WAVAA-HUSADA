@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Pembayaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pembayaran
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <form action="{{ route('pembayaran.update', $pembayaran->ID_PEMBAYARAN) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pembayaran</label>
                            <input type="text" name="id_pembayaran" value="{{ $pembayaran->ID_PEMBAYARAN }}"class="form-control" id="exampleInputEmail1"
                                placeholder="Enter ID Pembayaran">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pegawai</label>
                            <select class="form-control" name="id_pegawai" id="id_pegawai" required>
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->ID_PEGAWAI }}">
                                        {{ $p->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pasien</label>
                            <select class="form-control" name="id_pasien" id="id_pasien" required>
                                @foreach ($pasien as $pa)
                                    <option value="{{ $pa->ID_PASIEN }}">
                                        {{ $pa->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Kamar</label>
                            <select class="form-control" name="id_kamar" id="id_kamar" required>
                                @foreach ($kamar as $k)
                                    <option value="{{ $k->ID_KAMAR }}">
                                        {{ $k->NO_KAMAR }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Dokter</label>
                            <select class="form-control" name="id_dokter" id="id_dokter" required>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->ID_DOKTER }}">
                                        {{ $d->NAMA_DOKTER }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keluhan</label>
                            <select class="form-control" name="id_pemeriksaan" id="id_pemeriksaan" required>
                                @foreach ($pemeriksaan as $pem)
                                    <option value="{{ $pem->ID_PEMERIKSAAN }}">
                                        {{ $pem->KELUHAN }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Perawatan</label>
                            <select class="form-control" name="id_jenis_perawatan" id="id_jenis_perawatan" required>
                                @foreach ($jenis as $j)
                                    <option value="{{ $j->ID_JENIS_PERAWATAN }}">
                                        {{ $j->NAMA_JENIS }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Obat</label>
                            <select class="form-control" name="id_obat" id="id_obat" required>
                                @foreach ($obat as $o)
                                    <option value="{{ $o->ID_OBAT }}">
                                        {{ $o->NAMA_OBAT }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Tenaga Kesehatan</label>
                            <select class="form-control" name="id_tenaga_kesehatan" id="id_tenaga_kesehatan" required>
                                @foreach ($tenkes as $k)
                                    <option value="{{ $k->ID_TENAGA_KESEHATAN }}">
                                        {{ $k->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
