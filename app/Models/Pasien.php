<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "tb_pasien";
    protected $primaryKey = 'ID_PASIEN';
    protected $fillable = ['ID_PASIEN', 'NAMA', 'TGL_LAHIR', 'JENIS_KELAMIN', 'ALAMAT', 'NO_TELP', 'RIWAYAT', 'ALERGI'];
    public $timestamps = false;
}
