<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = "tb_dokter";
    protected $primaryKey = 'ID_DOKTER';
    protected $fillable = ['ID_DOKTER', 'ID_PENGGUNA', 'NAMA_DOKTER', 'SPESIALIS', 'NO_REGRISTASI', 'ALAMAT', 'NO_TELP', 'EMAIL', 'JADWAL_KERJA', 'TARIF_KONSULTASI', 'RIWAYAT_PENDIDIKAN'];
    public $timestamps = false;
}
