<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "tb_pegawai";
    protected $primaryKey = 'ID_PEGAWAI';
    protected $fillable = ['ID_PEGAWAI','ID_PENGGUNA','NAMA','NO_REGISTRASI','ALAMAT','NO_TELP','EMAIL','JADWAL_KERJA','UNIT_KERJA'];
    public $timestamps = false;
}
