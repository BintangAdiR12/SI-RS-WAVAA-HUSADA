@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Tenaga Kesehatan</h3>
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
    <section class="section">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <form action="{{ route('tenaga-kesehatan.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pengguna</label>
                            <select class="form-control" name="id_pengguna" id="id_pengguna" required>
                                @foreach ($pengguna as $k)
                                    <option value="{{ $k->ID_PENGGUNA }}">
                                        {{ $k->NAMA_PENGGUNA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter nama">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Registrasi</label>
                            <input type="text" name="no_regristasi" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jadwal Kerja</label>
                            <input type="date" name="jadwal_kerja" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No_Telp</label>
                            <input type="text" name="no_telp" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
