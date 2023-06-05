<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengguna;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::join('tb_pengguna', 'tb_pengguna.ID_PENGGUNA', 'tb_pegawai.ID_PENGGUNA')
        ->select('tb_pegawai.*', 'tb_pengguna.*')
        ->paginate(10);
        return view('pegawai/pegawai', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['pengguna'] = Pengguna::all();
        return view('pegawai.tambah-pegawai',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'ID_PEGAWAI' => rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama_pegawai,
            'NO_REGISTRASI' => $request->no_registrasi,
            'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'EMAIL' => $request->email,
            'JADWAL_KERJA' => $request->jadwal_kerja,
            'UNIT_KERJA' => $request->unit_kerja,
        ]);
        return redirect('pegawai');
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
    public function edit(Pegawai $pegawai)
    {
        $data['pengguna'] = Pengguna::all();
        return view('pegawai/edit-pegawai', compact('pegawai'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pegawai $pegawai)
    {
        $pegawai->update([
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama_pegawai,
            'NO_REGISTRASI' => $request->no_registrasi,
            'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'EMAIL' => $request->email,
            'JADWAL_KERJA' => $request->jadwal_kerja,
            'UNIT_KERJA' => $request->unit_kerja,
        ]);
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('pegawai');
    }
    public function print()
{
    $pegawai = Pegawai::join('tb_pengguna', 'tb_pengguna.ID_PENGGUNA', 'tb_pegawai.ID_PENGGUNA')
    ->select('tb_pegawai.*', 'tb_pengguna.*')->get();
    $pdf = FacadePdf::loadview('pegawai/laporan-pegawai',['pegawai'=> $pegawai])->setPaper('a4');
    return $pdf->download('laporan-pegawai.pdf');
}
}
