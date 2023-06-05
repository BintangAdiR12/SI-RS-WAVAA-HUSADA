<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pengguna;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::join('tb_pengguna', 'tb_pengguna.ID_PENGGUNA', '=', 'tb_dokter.ID_PENGGUNA')
        ->select('tb_dokter.*', 'tb_pengguna.*')
        ->paginate(10);
        return view('dokter/dokter', compact('dokter'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pengguna'] = Pengguna::all();
        return view('dokter/tambah-dokter', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dokter::create([
            'ID_DOKTER' => rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA_DOKTER' => $request->nama_dokter,
            'SPESIALIS' => $request->spesialis,
            'NO_REGRISTASI' => $request->no_registrasi,
            'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'EMAIL' => $request->email,
            'JADWAL_KERJA' => $request->jadwal_kerja,
            'TARIF_KONSULTASI' => $request->tarif,
            'RIWAYAT_PENDIDIKAN' => $request->riwayat,
        ]);
        return redirect('dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        $data['pengguna'] = Pengguna::all();
        return view('dokter/edit-dokter', compact('dokter'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $dokter-> update([
            'ID_DOKTER' => rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA_DOKTER' => $request->nama_dokter,
            'SPESIALIS' => $request->spesialis,
            'NO_REGRISTASI' => $request->no_registrasi,
            'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'EMAIL' => $request->email,
            'JADWAL_KERJA' => $request->jadwal_kerja,
            'TARIF_KONSULTASI' => $request->tarif,
            'RIWAYAT_PENDIDIKAN' => $request->riwayat,
        ]);
        return redirect('dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect('dokter');

    }
    public function print()
{
    $dokter = Dokter::join('tb_pengguna', 'tb_pengguna.ID_PENGGUNA', '=', 'tb_dokter.ID_PENGGUNA')
    ->select('tb_dokter.*', 'tb_pengguna.*')->get();
    $pdf = Pdf::loadview('dokter/laporan-dokter',['dokter'=> $dokter])->setPaper('a4');
    return $pdf->download('laporan-dokter.pdf');
}
}
