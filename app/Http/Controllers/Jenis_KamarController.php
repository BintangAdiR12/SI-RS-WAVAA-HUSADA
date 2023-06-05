<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kamar;
use App\Models\kamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Jenis_KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jkamar = Jenis_kamar::join('tb_kamar', 'tb_kamar.ID_KAMAR', 'tb_jenis_kamar.ID_KAMAR')
        ->select('tb_kamar.*', 'tb_jenis_kamar.*')
        ->paginate(10);
        return view('jenis-kamar/jenis-kamar', compact('jkamar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kamar'] = kamar::all();
         return view('jenis-kamar.tambah-jenis-kamar', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jenis_Kamar::create([
            'ID_JENIS_KAMAR' => rand(),
            'ID_KAMAR' => $request->id_kamar,
            'NAMA_JENIS_KAMAR' => $request->nama_kamar,
            'DESKRIPSI' => $request->deskripsi,
            'FASILITAS' => $request->fasilitas,
            'KAPASITAS' => $request->kapasitas,
            'TARIF_KAMAR' => $request->tarif,
            'RUANG_ASAL_PASIEN' => $request->ruang_asal,
        ]);
        return redirect('jenis-kamar');
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
    public function edit(Jenis_Kamar $jenis_kamar)
    {
        $data['kamar'] = kamar::all();
        return view('jenis-kamar/edit-jenis-kamar', compact('jenis_kamar'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Jenis_Kamar $jenis_kamar)
    {
        $jenis_kamar-> update([
            'ID_JENIS_KAMAR' => rand(),
            'ID_KAMAR' => $request->id_kamar,
            'NAMA_JENIS_KAMAR' => $request->nama_kamar,
            'DESKRIPSI' => $request->deskripsi,
            'FASILITAS' => $request->fasilitas,
            'KAPASITAS' => $request->kapasitas,
            'TARIF_KAMAR' => $request->tarif,
            'RUANG_ASAL_PASIEN' => $request->ruang_asal,
        ]);
        return redirect('jenis-kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_Kamar $jenis_kamar)
    {
        $jenis_kamar->delete();
        return redirect('jenis_kamar');
    }
    public function print()
{
    $jenis_kamar = Jenis_kamar::join('tb_kamar', 'tb_kamar.ID_KAMAR', 'tb_jenis_kamar.ID_KAMAR')
        ->select('tb_kamar.*', 'tb_jenis_kamar.*')->get();
    $pdf = Pdf::loadview('jenis-kamar/laporan-jenis-kamar',['jenis_kamar'=> $jenis_kamar])->setPaper('a4');
    return $pdf->download('laporan-jenis-kamar.pdf');
}
}
