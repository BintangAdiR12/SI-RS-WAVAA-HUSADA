@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Jenis Perawatan</h3>
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
    <section class="section">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <form action="{{ route('jenis-perawatan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Jenis</label>
                            <input type="text" name="nama_jenis" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Dokter</label>
                            <select class="form-control" name="id_dokter" id="id_dokter" required>
                                @foreach ($dokter as $k)
                                    <option value="{{ $k->ID_DOKTER }}">
                                        {{ $k->NAMA_DOKTER }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Tenaga Kesehatan</label>
                            <select class="form-control" name="id_tenaga_kesehatan" id="id_tenaga_kesehatan" required>
                                @foreach ($tenagakesehatan as $t)
                                    <option value="{{ $t->ID_TENAGA_KESEHATAN }}">
                                        {{ $t->NAMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input type="text" name="status" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" name="harga" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Durasi</label>
                            <input type="text" name="durasi" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
