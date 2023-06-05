<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = "tb_pembayaran";
    protected $primaryKey = 'ID_PEMBAYARAN';
    protected $fillable = ['ID_PEMBAYARAN', 'ID_PEGAWAI', 'ID_PASIEN', 'ID_KAMAR', 'ID_DOKTER', 'ID_PEMERIKSAAN', 'ID_JENIS_PERAWATAN', 'ID_OBAT', 'ID_TENAGA_KESEHATAN'];
    public $timestamps = false;
}
