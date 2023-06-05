<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kamar extends Model
{
    use HasFactory;
    protected $table = "tb_jenis_kamar";
    protected $primaryKey = 'ID_JENIS_KAMAR';
    protected $fillable = ['ID_JENIS_KAMAR','ID_KAMAR','NAMA_JENIS_KAMAR','DESKRIPSI','FASILITAS','KAPASITAS','TARIF_KAMAR','RUANG_ASAL_PASIEN'];
    public $timestamps = false;
}
