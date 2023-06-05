@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Jenis Kamar</h3>
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
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('jenis-kamar.store') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">No Kamar</label>
                                <select class="form-control" name="id_kamar" id="id_kamar" required>
                                    @foreach ($kamar as $k)
                                        <option value="{{ $k->ID_KAMAR }}">
                                            {{ $k->ID_KAMAR }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Jenis Kamar</label>
                                <input type="text" name="nama_kamar" class="form-control" id="exampleInputPassword1"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fasilitas</label>
                                <input type="text" name="fasilitas" class="form-control" id="exampleInputPassword1"
                                    placeholder="Enter Fasilitas">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" id="exampleInputPassword1"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tarif Kamar</label>
                                <input type="number" name="tarif" class="form-control" id="exampleInputPassword1"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ruang Asal Jenis Kamar</label>
                                <input type="text" name="ruang_asal" class="form-control" id="exampleInputPassword1"
                                    placeholder="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
