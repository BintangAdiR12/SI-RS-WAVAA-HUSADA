<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = "tb_pengguna";
    protected $primaryKey = 'ID_PENGGUNA';
    protected $fillable = ['ID_PENGGUNA', 'NAMA_PENGGUNA', 'USERNAME', 'PASSWORD', 'HAK_AKSES'];
    public $timestamps = false;
}
