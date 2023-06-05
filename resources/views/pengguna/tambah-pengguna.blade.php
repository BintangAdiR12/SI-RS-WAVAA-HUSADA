@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Pengguna</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pengguna
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
                    <form action="{{ route('pengguna.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pengguna</label>
                            <input type="text" name="nama_pengguna" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" name="password" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hak Akses</label>
                            <input type="text" name="hak_akses" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
