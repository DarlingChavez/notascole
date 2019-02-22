<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

}
