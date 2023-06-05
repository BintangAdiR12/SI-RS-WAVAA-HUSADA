<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kamar;
use App\Models\kamar;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = kamar::join('tb_pegawai', 'tb_kamar.ID_PEGAWAI', '=', 'tb_pegawai.ID_PEGAWAI')
            ->join('tb_tenaga_kesehatan', 'tb_kamar.ID_TENAGA_KESEHATAN', '=', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN')
            ->join('tb_pasien', 'tb_kamar.ID_PASIEN', '=', 'tb_pasien.ID_PASIEN')
            ->select('tb_kamar.*', 'tb_pasien.NAMA as NAMA_PASIEN', 'tb_pegawai.NAMA as NAMA_PEGAWAI', 'tb_tenaga_kesehatan.NAMA as NAMA_TENKES')
            ->paginate(10);
        return view('kamar/kamar', compact('kamar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["pasien"] = Pasien::all();
        $data["tenkes"] = Tenaga_Kesehatan::all();
        $data["pegawai"] = Pegawai::all();
        return view('kamar/tambah-kamar', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kamar::create([
            'ID_KAMAR' => rand(),
            'ID_PEGAWAI' => $request->id_pegawai,
            'ID_PASIEN' => $request->id_pasien,
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
            'NO_KAMAR' => $request->no_kamar,
            'TIPE_KAMAR' => $request->tipe_kamar,
            'KAPASITAS' => $request->kapasitas,
            'FASILITAS' => $request->fasilitas,
            'KONDISI' => $request->kondisi,
            'TARIF_KAMAR' => $request->tarif,
            'KETERANGAN' => $request->keterangan,
        ]);
        return redirect('kamar');
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
    public function edit(Kamar $kamar)
    {
        $data["pasien"] = Pasien::all();
        $data["tenkes"] = Tenaga_Kesehatan::all();
        $data["pegawai"] = Pegawai::all();
        return view('kamar/edit-kamar', compact('kamar'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $kamar-> update([
            'ID_KAMAR' => rand(),
            'ID_PEGAWAI' => $request->id_pegawai,
            'ID_PASIEN' => $request->id_pasien,
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
            'NO_KAMAR' => $request->no_kamar,
            'TIPE_KAMAR' => $request->tipe_kamar,
            'KAPASITAS' => $request->kapasitas,
            'FASILITAS' => $request->fasilitas,
            'KONDISI' => $request->kondisi,
            'TARIF_KAMAR' => $request->tarif,
            'KETERANGAN' => $request->keterangan,
        ]);
        return redirect('kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect('kamar');
    }
    public function print()
{
    $kamar = kamar::join('tb_pegawai', 'tb_kamar.ID_PEGAWAI', '=', 'tb_pegawai.ID_PEGAWAI')
            ->join('tb_tenaga_kesehatan', 'tb_kamar.ID_TENAGA_KESEHATAN', '=', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN')
            ->join('tb_pasien', 'tb_kamar.ID_PASIEN', '=', 'tb_pasien.ID_PASIEN')
            ->select('tb_kamar.*', 'tb_pasien.NAMA as NAMA_PASIEN', 'tb_pegawai.NAMA as NAMA_PEGAWAI', 'tb_tenaga_kesehatan.NAMA as NAMA_TENKES')->get();
    $pdf = Pdf::loadview('kamar/laporan-kamar',['kamar'=> $kamar])->setPaper('a4');
    return $pdf->download('laporan-kamar.pdf');
}
}
