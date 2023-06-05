<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jenis_Perawatan;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Jenis_PerawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perawatan = Jenis_Perawatan::join('tb_dokter', 'tb_dokter.ID_DOKTER', 'tb_jenis_perawatan.ID_DOKTER')
        ->join('tb_tenaga_kesehatan', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN', 'tb_jenis_perawatan.ID_TENAGA_KESEHATAN')
        ->select( 'tb_jenis_perawatan.*','tb_dokter.*','tb_tenaga_kesehatan.*')
        ->paginate(10);
        return view('jenis-perawatan/jenis-perawatan', compact('perawatan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['dokter'] = Dokter::all();
        $data['tenagakesehatan'] = Tenaga_Kesehatan::all();
        return view('jenis-perawatan.tambah-jenis-perawatan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jenis_Perawatan::create([
            'ID_JENIS_PERAWATAN' => rand(),
            'ID_DOKTER' => $request->id_dokter,
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
            'NAMA_JENIS' => $request->nama_jenis,
            'DESKRIPSI' => $request->deskripsi,
            'STATUS' => $request->status,
            'HARGA' => $request->harga,
            'DURASI' => $request->durasi,
        ]);
        return redirect('jenis-perawatan');
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
    public function edit(Jenis_Perawatan $jenis_perawatan)
    {
        $data['dokter'] = Dokter::all();
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('jenis-perawatan/edit-jenis-perawatan', compact('jenis_perawatan'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis_Perawatan $jenis_perawatan)
    {
        $jenis_perawatan -> update([
            'ID_DOKTER' => $request->id_dokter,
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
            'NAMA_JENIS' => $request->nama_jenis,
            'DESKRIPSI' => $request->deskripsi,
            'STATUS' => $request->status,
            'HARGA' => $request->harga,
            'DURASI' => $request->durasi,
        ]);
        return redirect('jenis-perawatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_Perawatan $jenis_perawatan)
    {
        $jenis_perawatan->delete();
        return redirect('jenis-perawatan');
    }
    public function print()
{
    $jenis_perawatan = Jenis_Perawatan::join('tb_dokter', 'tb_dokter.ID_DOKTER', 'tb_jenis_perawatan.ID_DOKTER')
        ->join('tb_tenaga_kesehatan', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN', 'tb_jenis_perawatan.ID_TENAGA_KESEHATAN')
        ->select( 'tb_jenis_perawatan.*','tb_dokter.*','tb_tenaga_kesehatan.*')->get();
    $pdf = Pdf::loadview('jenis-perawatan/laporan-jenis-perawatan',['jenis_perawatan'=> $jenis_perawatan])->setPaper('a4');
    return $pdf->download('laporan-jenis-perawatan.pdf');
}
}
