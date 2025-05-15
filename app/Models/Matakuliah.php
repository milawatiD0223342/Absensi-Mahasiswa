<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = ['kode', 'nama', 'dosen_id'];
    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }

    public function absensis() {
        return $this->hasMany(Absensi::class);
    }
    public function mahasiswas()
    {
    return $this->belongsToMany(Mahasiswa::class);
    }


}
