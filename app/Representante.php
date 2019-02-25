<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'cedula', 'telefono', 'email', 'nacimiento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'updatedbyuser',
    ];

    public function representados()
    {
        return $this->belongsToMany(Estudiante::class);
    }

}
