<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = "tb_kamar";
    protected $primaryKey = 'ID_KAMAR';
    protected $fillable = ['ID_KAMAR', 'ID_PEGAWAI', 'ID_PASIEN', 'ID_TENAGA_KESEHATAN', 'NO_KAMAR', 'TIPE_KAMAR', 'KAPASITAS', 'FASILITAS', 'KONDISI', 'TARIF_KAMAR', 'KETERANGAN'];
    public $timestamps = false;
}
