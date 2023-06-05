<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jenis_Perawatan;
use App\Models\kamar;
use App\Models\obat;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\Pemeriksaan_Dokter;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::join('tb_tenaga_kesehatan', 'tb_pembayaran.ID_TENAGA_KESEHATAN', '=', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN')
            ->join('tb_pegawai', 'tb_pembayaran.ID_PEGAWAI', '=', 'tb_pegawai.ID_PEGAWAI')
            ->join('tb_pasien', 'tb_pembayaran.ID_PASIEN', '=', 'tb_pasien.ID_PASIEN')
            ->join('tb_kamar', 'tb_pembayaran.ID_KAMAR', '=', 'tb_kamar.ID_KAMAR')
            ->join('tb_dokter', 'tb_pembayaran.ID_DOKTER', '=', 'tb_dokter.ID_DOKTER')
            ->join('tb_pemeriksaan_dokter', 'tb_pembayaran.ID_PEMERIKSAAN', '=', 'tb_pemeriksaan_dokter.ID_PEMERIKSAAN')
            ->join('tb_jenis_perawatan', 'tb_pembayaran.ID_JENIS_PERAWATAN', '=', 'tb_jenis_perawatan.ID_JENIS_PERAWATAN')
            ->join('tb_obat', 'tb_pembayaran.ID_OBAT', '=', 'tb_obat.ID_OBAT')
            ->select('tb_pembayaran.*', 'tb_dokter.*', 'tb_jenis_perawatan.*', 'tb_obat.NAMA_OBAT as NAMA_OBAT', 'tb_pemeriksaan_dokter.*', 'tb_tenaga_kesehatan.NAMA as NAMA_TENKES', 'tb_pegawai.NAMA as NAMA_PEGAWAI', 'tb_pasien.NAMA as NAMA_PASIEN', 'tb_kamar.NO_KAMAR as NO_KAMAR')
            ->paginate(10);
        return view('pembayaran/pembayaran', compact('pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = Pegawai::all();
        $data['pasien'] = Pasien::all();
        $data['kamar'] = kamar::all();
        $data['dokter'] = Dokter::all();
        $data['pemeriksaan'] = Pemeriksaan_Dokter::all();
        $data['jenis'] = Jenis_Perawatan::all();
        $data['obat'] = obat::all();
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('pembayaran.tambah-pembayaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembayaran::create([
            'ID_PEMBAYARAN' => rand(),
            'ID_PEGAWAI' => $request->id_pegawai,
            'ID_PASIEN' => $request->id_pasien,
            'ID_KAMAR' => $request->id_kamar,
            'ID_DOKTER' => $request->id_dokter,
            'ID_PEMERIKSAAN' => $request->id_pemeriksaan,
            'ID_JENIS_PERAWATAN' => $request->id_jenis_perawatan,
            'ID_OBAT' => $request->id_obat,
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
        ]);
        return redirect('pembayaran');
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
    public function edit(Pembayaran $pembayaran)
    {
        $data['pegawai'] = Pegawai::all();
        $data['pasien'] = Pasien::all();
        $data['kamar'] = Kamar::all();
        $data['dokter'] = Dokter::all();
        $data['pemeriksaan'] = Pemeriksaan_Dokter::all();
        $data['jenis'] = Jenis_Perawatan::all();
        $data['obat'] = Obat::all();
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('pembayaran/edit-pembayaran', compact('pembayaran'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pembayaran $pembayaran)
    {
        $pembayaran-> update([
            'ID_PEMBAYARAN' => rand(),
            'ID_PEGAWAI' => $request->id_pegawai,
            'ID_PASIEN' => $request->id_pasien,
            'ID_KAMAR' => $request->id_kamar,
            'ID_DOKTER' => $request->id_dokter,
            'ID_PEMERIKSAAN' => $request->id_pemeriksaan,
            'ID_JENIS_PERAWATAN' => $request->id_jenis_perawatan,
            'ID_OBAT' => $request->id_obat,
            'ID_TENAGA_KESEHATAN' => $request->id_tenaga_kesehatan,
        ]);
        return redirect('pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect('pembayaran');
    }
    public function print()
{
    $pembayaran = Pembayaran::join('tb_tenaga_kesehatan', 'tb_pembayaran.ID_TENAGA_KESEHATAN', '=', 'tb_tenaga_kesehatan.ID_TENAGA_KESEHATAN')
            ->join('tb_pegawai', 'tb_pembayaran.ID_PEGAWAI', '=', 'tb_pegawai.ID_PEGAWAI')
            ->join('tb_pasien', 'tb_pembayaran.ID_PASIEN', '=', 'tb_pasien.ID_PASIEN')
            ->join('tb_kamar', 'tb_pembayaran.ID_KAMAR', '=', 'tb_kamar.ID_KAMAR')
            ->join('tb_dokter', 'tb_pembayaran.ID_DOKTER', '=', 'tb_dokter.ID_DOKTER')
            ->join('tb_pemeriksaan_dokter', 'tb_pembayaran.ID_PEMERIKSAAN', '=', 'tb_pemeriksaan_dokter.ID_PEMERIKSAAN')
            ->join('tb_jenis_perawatan', 'tb_pembayaran.ID_JENIS_PERAWATAN', '=', 'tb_jenis_perawatan.ID_JENIS_PERAWATAN')
            ->join('tb_obat', 'tb_pembayaran.ID_OBAT', '=', 'tb_obat.ID_OBAT')
            ->select('tb_pembayaran.*', 'tb_dokter.*', 'tb_jenis_perawatan.*', 'tb_obat.NAMA_OBAT as NAMA_OBAT', 'tb_pemeriksaan_dokter.*', 'tb_tenaga_kesehatan.NAMA as NAMA_TENKES', 'tb_pegawai.NAMA as NAMA_PEGAWAI', 'tb_pasien.NAMA as NAMA_PASIEN', 'tb_kamar.NO_KAMAR as NO_KAMAR')->get();
    $pdf = FacadePdf::loadview('pembayaran/laporan-pembayaran',['pembayaran'=> $pembayaran])->setPaper('a4');
    return $pdf->download('laporan-pembayaran.pdf');
}
}
