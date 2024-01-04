<?php

namespace App\Models;

use App\Models\Presensi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'karyawan';

    protected $fillable = [
        'id',
        'nik',
        'name',
    ];

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
 
    
}
