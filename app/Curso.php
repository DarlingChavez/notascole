<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','grado','paralelo','nivel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'estado'
    ];


    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class);
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }


}
