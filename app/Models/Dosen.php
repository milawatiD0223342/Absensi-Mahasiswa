<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // app/Models/Dosen.php
 protected $fillable = ['nama', 'nidn'];

    public function matakuliahs() {
        return $this->hasMany(Matakuliah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
