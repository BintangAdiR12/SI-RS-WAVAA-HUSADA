@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Obat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Obat
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
                    <form action="{{ route('obat.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" id="exampleInputEmail1">
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter jenis kelamin">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ketersediaan</label>
                            <input type="number" name="ketersediaan" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <input type="number" name="stok" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kadaluarsa</label>
                            <input type="name" name="kadaluarsa" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
