<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $timestamps = false;

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

}
