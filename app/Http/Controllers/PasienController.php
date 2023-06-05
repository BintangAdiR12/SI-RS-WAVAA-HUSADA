<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\kamar;
use App\Models\Pasien;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::paginate(10);
        return view('pasien/pasien', compact('pasien'))->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('pasien/pasien');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pasien/tambah-pasien');
        // return view('pasien/tambah-pasien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pasien::create([
            'ID_PASIEN' => rand(),
            'NAMA' => $request->nama_pasien,
            'ALAMAT' => $request->alamat,
            'TGL_LAHIR' => $request->tgl_lahir,
            'JENIS_KELAMIN' => $request->jenis_kelamin,
            'NO_TELP' => $request->no_telp,
            'ALERGI' => $request->alergi,
            'RIWAYAT' => $request->riwayat_penyakit,
        ]);
        return redirect('pasien');
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
    public function edit(Pasien $pasien)
    {
        $data["kamar"] = kamar::all();
        $data["dokter"] = Dokter::all();
        return view('pasien/edit-pasien', compact('pasien'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pasien $pasien)
    {
        $pasien-> update([
            'ID_PASIEN' => rand(),
            'NAMA' => $request->nama_pasien,
            'ALAMAT' => $request->alamat,
            'TGL_LAHIR' => $request->tgl_lahir,
            'JENIS_KELAMIN' => $request->jenis_kelamin,
            'NO_TELP' => $request->no_telp,
            'ALERGI' => $request->alergi,
            'RIWAYAT' => $request->riwayat_penyakit,
        ]);
        return redirect('pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect('pasien');

    }
    public function print()
{
    $pasien = Pasien::get();
    $pdf = PDF::loadview('pasien/laporan-pasien',['pasien'=> $pasien])->setPaper('a4');
    return $pdf->download('laporan-pasien.pdf');
}
}
