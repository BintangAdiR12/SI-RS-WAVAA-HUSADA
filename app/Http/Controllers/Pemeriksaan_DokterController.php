<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pemeriksaan_Dokter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Pemeriksaan_DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeriksaan = Pemeriksaan_Dokter::join('tb_dokter', 'tb_dokter.ID_DOKTER', 'tb_pemeriksaan_dokter.ID_DOKTER')
            ->join('tb_pasien', 'tb_pasien.ID_PASIEN', 'tb_pemeriksaan_dokter.ID_PASIEN')
            ->select('tb_pemeriksaan_dokter.*', 'tb_dokter.*', 'tb_pasien.NAMA as NAMA_PASIEN')
            ->paginate(10);
        return view('pemeriksaan-dokter/pemeriksaan-dokter', compact('pemeriksaan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["pasien"] = Pasien::all();
        $data["dokter"] = Dokter::all();
        return view('pemeriksaan-dokter/tambah-pemeriksaan-dokter', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemeriksaan_Dokter::create([
            'ID_PEMERIKSAAN' => rand(),
            'ID_DOKTER' => $request->id_dokter,
            'ID_PASIEN' => $request->id_pasien,
            'TGL_PEMERIKSAAN' => $request->tanggal,
            'KELUHAN' => $request->keluhan,
            'DIAGNOSA' => $request->diagnosa,
            'BIAYA' => $request->biaya,

        ]);
        return redirect('pemeriksaan-dokter');
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
    public function edit(Pemeriksaan_Dokter $pemeriksaan_dokter)
    {
        $data["pasien"] = Pasien::all();
        $data["dokter"] = Dokter::all();
        return view('pemeriksaan-dokter/edit-pemeriksaan-dokter', compact('pemeriksaan_dokter'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pemeriksaan_Dokter $pemeriksaan_dokter)
    {
        $pemeriksaan_dokter-> update([
            'ID_DOKTER' => $request->id_dokter,
            'ID_PASIEN' => $request->id_pasien,
            'TGL_PEMERIKSAAN' => $request->tanggal,
            'KELUHAN' => $request->keluhan,
            'DIAGNOSA' => $request->diagnosa,
            'BIAYA' => $request->biaya,

        ]);
        return redirect('pemeriksaan-dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan_Dokter $pemeriksaan_dokter)
    {
        $pemeriksaan_dokter->delete();
        return redirect('pemeriksaan-dokter');
    }
public function print()
{
    $pemeriksaan_dokter = Pemeriksaan_Dokter::join('tb_dokter', 'tb_dokter.ID_DOKTER', 'tb_pemeriksaan_dokter.ID_DOKTER')
    ->join('tb_pasien', 'tb_pasien.ID_PASIEN', 'tb_pemeriksaan_dokter.ID_PASIEN')
    ->select('tb_pemeriksaan_dokter.*', 'tb_dokter.*', 'tb_pasien.NAMA as NAMA_PASIEN') ->get();
    $pdf = Pdf::loadview('pemeriksaan-dokter/laporan-pemeriksaan-dokter',['pemeriksaan_dokter'=> $pemeriksaan_dokter])->setPaper('a4');
    return $pdf->download('laporan-pemeriksaan-dokter.pdf');
}
}

