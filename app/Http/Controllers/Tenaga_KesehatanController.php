<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class Tenaga_KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenkes = Tenaga_Kesehatan::join('tb_pengguna', 'tb_pengguna.ID_PENGGUNA', '=', 'tb_tenaga_kesehatan.ID_PENGGUNA')
            ->select('tb_tenaga_kesehatan.*', 'tb_pengguna.*')
            ->paginate(10);
        return view('tenaga-kesehatan/tenaga-kesehatan', compact('tenkes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["pengguna"] = Pengguna::all();
        return view('tenaga-kesehatan/tambah-tenaga-kesehatan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tenaga_kesehatan::create([
            'ID_TENAGA_KESEHATAN' =>rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama,
            'NO_REGRISTASI' => $request->no_regristasi,
            'ALAMAT' => $request->alamat,
            'JADWAL_KERJA' => $request->jadwal_kerja,
            'NO_TELP' => $request->no_telp,
            'EMAIL' => $request->email,

        ]);
        return redirect('tenaga-kesehatan');
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
    public function edit(Tenaga_Kesehatan $tenaga_kesehatan)
    {
        $data['pengguna'] = Pengguna::all();
        return view('tenaga-kesehatan/edit-tenaga-kesehatan',compact('tenaga_kesehatan'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenaga_Kesehatan $tenaga_kesehatan)
    {
        $tenaga_kesehatan->update([

            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama,
            'NO_REGRISTASI	' => $request->no_regristasi,
             'ALAMAT' => $request->alamat,
            'NO_TELP' => $request->no_telp,
            'EMAIL' => $request->email,
            'JADWAL_KERJA' => $request->jadwal_kerja,
        ]);
        return redirect('tenaga-kesehatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenaga_Kesehatan $tenaga_kesehatan)
    {
        $tenaga_kesehatan->delete();
        return redirect('tenaga-kesehatan');
    }
    public function print()
{
    $tenaga_kesehatan = Tenaga_Kesehatan::join('tb_pengguna', 'tb_pengguna.ID_PENGGUNA', '=', 'tb_tenaga_kesehatan.ID_PENGGUNA')
            ->select('tb_tenaga_kesehatan.*', 'tb_pengguna.*')->get();
    $pdf = PDF::loadview('tenaga-kesehatan/laporan-tenaga-kesehatan',['tenaga_kesehatan'=> $tenaga_kesehatan])->setPaper('a4');
    return $pdf->download('laporan-tenaga-kesehatan.pdf');
}
}
