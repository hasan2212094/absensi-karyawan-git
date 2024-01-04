<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'id_karyawan',
        'tanggal',
        'jammasuk',
        'jamkeluar',
        'jamlembur',
        'jamkerja'
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class,'nik');
    }
    public function name()
    {
        return $this->hasOne(Karyawan::class,'nik','id_karyawan');
    }



}
