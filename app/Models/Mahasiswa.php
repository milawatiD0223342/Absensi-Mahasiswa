<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'nim'];
    public function absensis() {
        return $this->hasMany(Absensi::class);
    }

    public function matakuliahs()
{
    return $this->belongsToMany(Matakuliah::class);
}


}
