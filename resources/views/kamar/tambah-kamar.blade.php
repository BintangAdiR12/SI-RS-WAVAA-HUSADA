@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Kamar</h3>
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
    <section class="section">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <form action="{{ route('kamar.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Kamar</label>
                            <input type="text" name="id_kamar" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter ID Kamar">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pasien</label>
                            <select class="form-control" name="id_pasien" id="id_pasien" required>
                                @foreach ($pasien as $k)
                                    <option value="{{ $k->ID_PASIEN }}">
                                        {{ $k->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <select class="form-control" name="id_pegawai" id="id_pegawai" required>
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->ID_PEGAWAI }}">
                                        {{ $p->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Tenaga Kesehatan</label>
                            <select class="form-control" name="id_tenaga_kesehatan" id="id_tenaga_kesehatan" required>
                                @foreach ($tenkes as $t)
                                    <option value="{{ $t->ID_TENAGA_KESEHATAN }}">
                                        {{ $t->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Kamar</label>
                            <input type="text" name="no_kamar" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipe Kamar</label>
                            <input type="text" name="tipe_kamar" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fasilitas</label>
                            <textarea name="fasilitas" id="fasilitas" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kondisi</label>
                            <input type="text" name="kondisi" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tarif Kamar</label>
                            <input type="number" name="tarif" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
