<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    //
    public function users()
    {
        // una especialidad se asocia con multiples usuarios
        return $this->belongsToMany(User::class)->withTimestamps();

    }
}
