<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function Curso(){
        return $this->belongsTo(Curso::class);
    }
}
