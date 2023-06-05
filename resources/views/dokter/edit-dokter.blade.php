@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Edit Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dokter
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
                    <form action="{{ route('dokter.update', $dokter->ID_DOKTER) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Dokter</label>
                            <input type="text" name="id_dokter" value="{{ $dokter->ID_DOKTER }}" readonly class="form-control" id="exampleInputEmail1"
                                placeholder="Enter ID">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pengguna</label>
                            <select class="form-control" name="id_pengguna"  id="id_pengguna" required>
                                @foreach ($pengguna as $k)
                                    <option value="{{ $k->ID_PENGGUNA }}">
                                        {{ $k->NAMA_PENGGUNA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama_dokter" class="form-control" value="{{ $dokter->NAMA_DOKTER }}" id="exampleInputEmail1"
                                placeholder="Enter nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Spesialis</label>
                            <input type="text" name="spesialis" class="form-control" value="{{ $dokter->SPESIALIS }}" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Registrasi</label>
                            <input type="text" name="no_registrasi" class="form-control" value="{{ $dokter->NO_REGRISTASI }}"id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $dokter->ALAMAT }}"id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $dokter->EMAIL }}" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jadwal Kerja</label>
                            <input type="text" name="jadwal_kerja" class="form-control" value="{{ $dokter->JADWAL_KERJA }}"id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telp</label>
                            <input type="text" name="no_telp" class="form-control"value="{{ $dokter->NO_TELP }}" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tarif Konsultasi</label>
                            <input type="number" name="tarif" class="form-control" value="{{ $dokter->TARIF_KONSULTASI }}"id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Riwayat Pendidikan</label>
                            <input type="text" name="riwayat" class="form-control" value="{{ $dokter->RIWAYAT_PENDIDIKAN }}"id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
