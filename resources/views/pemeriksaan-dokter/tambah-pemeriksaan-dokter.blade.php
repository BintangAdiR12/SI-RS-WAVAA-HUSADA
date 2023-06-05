@extends('template')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Pemeriksaan Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pemeriksaan Dokter
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
                    <form action="{{ route('pemeriksaan-dokter.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pemeriksaan Dokter</label>
                            <select class="form-control" name="id_pasien" id="id_pasien" required>
                                @foreach ($pasien as $b)
                                    <option value="{{ $b->ID_PASIEN }}">
                                        {{ $b->NAMA }}
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
                            <label for="exampleInputPassword1">Tanggal Pemeriksaan</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keluhan</label>
                            <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Diagnosa</label>
                            <textarea name="diagnosa" id="diagnosa" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Biaya</label>
                            <input type="number" name="biaya" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
