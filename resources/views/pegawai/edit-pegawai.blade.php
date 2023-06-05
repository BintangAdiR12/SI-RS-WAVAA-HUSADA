@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Pegawai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pegawai
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
                    <form action="{{ route('pegawai.update', $pegawai->ID_PEGAWAI) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pegawai</label>
                            <input type="text" name="id_pegawai" value="{{ $pegawai->ID_PEGAWAI }}"class="form-control"
                                id="exampleInputEmail1" placeholder="Enter ID Pegawai">
                        </div>
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
                            <label for="exampleInputPassword1">Nama Pegawai</label>
                            <input type="text" name="nama_pegawai"
                                value="{{ $pegawai->NAMA }}"class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Registrasi</label>
                            <input type="text" name="no_registrasi"
                                value="{{ $pegawai->NO_REGISTRASI }}"class="form-control" id="exampleInputEmail1"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="alamat" value="{{ $pegawai->ALAMAT }}"class="form-control"
                                id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telp</label>
                            <input type="text" name="no_telp" value="{{ $pegawai->NO_TELP }}"class="form-control"
                                id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="{{ $pegawai->EMAIL }}"class="form-control"
                                id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jadwal Kerja</label>
                            <textarea name="jadwal_kerja" id="jadwal_kerja" class="form-control">{{ $pegawai->JADWAL_KERJA }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Unit Kerja</label>
                            <textarea name="unit_kerja" id="unit_kerja" class="form-control">{{ $pegawai->UNIT_KERJA }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
