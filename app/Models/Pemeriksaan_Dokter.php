<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan_Dokter extends Model
{
    use HasFactory;
    protected $table = "tb_pemeriksaan_dokter";
    protected $primaryKey = 'ID_PEMERIKSAAN';
    protected $fillable = ['ID_PEMERIKSAAN', 'ID_DOKTER', 'ID_PASIEN', 'TGL_PEMERIKSAAN', 'KELUHAN', 'DIAGNOSA', 'BIAYA'];
    public $timestamps = false;
}
