<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{

    protected $fillable = [
        'mahasiswa_id', 'matakuliah_id', 'tanggal', 'jam', 'status'
    ];


    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah() {
        return $this->belongsTo(Matakuliah::class);
    }

}
