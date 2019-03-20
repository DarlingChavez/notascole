<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*
    protected $hidden = [
        'id', 'estado'
    ];
    */

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

}
