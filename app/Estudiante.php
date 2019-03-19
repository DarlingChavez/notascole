<?php

namespace notascole;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{

    protected  $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombres', 'apellidopaterno', 'apellidomaterno', 'nacimiento', 'telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'curso_id', 'email', 'updatedbyuser', 'estado'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function representantes()
    {
        return $this->belongsToMany(Representante::class);
    }

    public function fullname(){
        return $this->nombres.' '.$this->apellidopaterno.' '.$this->apellidomaterno;
    }

}
