@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pasien
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
                    <form action="{{ route('pasien.update', $pasien->ID_PASIEN) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pasien</label>
                            <input type="text" name="id_pasien" value="{{ $pasien->ID_PASIEN }}"class="form-control" id="exampleInputEmail1"
                                placeholder="Enter ID Pasien">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pasien</label>
                            <input type="text" name="nama_pasien" value="{{ $pasien->NAMA_PASIEN }}"class="form-control" id="exampleInputPassword1"
                                placeholder="Enter Nama Pasien">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="{{ $pasien->TGL_LAHIR }}"class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" value="{{ $pasien->JENIS_KELAMIN }}"class="form-control" id="exampleInputEmail1"
                                placeholder="Enter jenis kelamin">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="alamat" value="{{ $pasien->ALAMAT }}"class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Alamat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Telepon</label>
                            <input type="text" name="no_telp" value="{{ $pasien->NO_TELP }}"class="form-control" id="exampleInputEmail1"
                                placeholder="Enter nomor telepon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Riwayat Penyakit</label>
                            <textarea name="riwayat_penyakit" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alergi</label>
                            <textarea name="alergi" id="" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
