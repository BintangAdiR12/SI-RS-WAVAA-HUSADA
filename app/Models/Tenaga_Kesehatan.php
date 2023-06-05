<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenaga_Kesehatan extends Model
{
    use HasFactory;
    protected $table = "tb_tenaga_kesehatan";
    protected $primaryKey = 'ID_TENAGA_KESEHATAN';
    protected $fillable = ['ID_TENAGA_KESEHATAN', 'ID_PENGGUNA', 'NAMA', 'NO_REGRISTASI', 'ALAMAT', 'NO_TELP', 'EMAIL', 'JADWAL_KERJA'];
    public $timestamps = false;
}
