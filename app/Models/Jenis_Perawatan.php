<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Perawatan extends Model
{
    use HasFactory;
    protected $table = "tb_jenis_perawatan";
    protected $primaryKey = 'ID_JENIS_PERAWATAN';
    protected $fillable = ['ID_JENIS_PERAWATAN', 'ID_DOKTER', 'ID_TENAGA_KESEHATAN', 'NAMA_JENIS', 'DESKRIPSI', 'STATUS', 'HARGA', 'DURASI'];
    public $timestamps = false;
}
