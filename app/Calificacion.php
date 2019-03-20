<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;
use notascole\Asignatura;
use notascole\Estudiante;

class Calificacion extends Model
{
    protected $table = 'calificaciones';


    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }


}
