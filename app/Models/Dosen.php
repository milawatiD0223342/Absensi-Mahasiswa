<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public function matakuliahs() {
        return $this->hasMany(Matakuliah::class);
    }

}
