<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $table = "tb_obat";
    protected $primaryKey = 'ID_OBAT';
    protected $fillable = ['ID_OBAT', 'ID_TENAGA_KESEHATAN', 'NAMA_OBAT', 'KATEGORI', 'DESKRIPSI', 'KETERSEDIAAN', 'STOK', 'KADALUARSA'];
    public $timestamps = false;
}
