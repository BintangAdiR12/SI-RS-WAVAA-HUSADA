<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = obat::join('tb_tenaga_kesehatan', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN', 'tb_obat.ID_TENAGA_KESEHATAN')
            ->select('tb_obat.*', 'tb_tenaga_kesehatan.*')
            ->paginate(10);
        return view('obat/obat', compact('obat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('obat.tambah-obat', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Obat::create([
            'ID_OBAT' => rand(),
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
            'NAMA_OBAT' => $request->nama_obat,
            'KATEGORI' => $request->kategori,
            'DESKRIPSI' => $request->deskripsi,
            'KETERSEDIAAN' => $request->ketersediaan,
            'STOK' => $request->stok,
            'KADALUARSA' => $request->kadaluarsa,
        ]);
        return redirect('obat');
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
    public function edit(Obat $obat)
    {
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('obat/edit-obat', compact('obat'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->update([
            'ID_OBAT' => rand(),
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
            'NAMA_OBAT' => $request->nama_obat,
            'KATEGORI' => $request->kategori,
            'DESKRIPSI' => $request->deskripsi,
            'KETERSEDIAAN' => $request->ketersediaan,
            'STOK' => $request->stok,
            'KADALUARSA' => $request->kadaluarsa,
        ]);
        return redirect('obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect('obat');
    }
    public function print()
{
    $obat = obat::join('tb_tenaga_kesehatan', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN', 'tb_obat.ID_TENAGA_KESEHATAN')
            ->select('tb_obat.*', 'tb_tenaga_kesehatan.*')->get();
    $pdf = FacadePdf::loadview('obat/laporan-obat',['obat'=> $obat])->setPaper('a4');
    return $pdf->download('laporan-obat.pdf');
}
}
