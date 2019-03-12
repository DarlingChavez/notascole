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

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function fullname(){
        return $this->nombres.' '.$this->apellidos;
    }

    public function representadosCount(){
        return $this->estudiantes()
                    ->selectRaw('estudiante_id, count(*) as contador')
                    ->groupBy('representante_id');
    }

}
