<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }

    public function absensis() {
        return $this->hasMany(Absensi::class);
    }

}
