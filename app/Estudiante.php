<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
