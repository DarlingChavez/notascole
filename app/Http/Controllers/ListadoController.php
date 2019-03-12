<?php

namespace notascole\Http\Controllers;

use Illuminate\Http\Request;
use notascole\AnhioLectivo;
use notascole\Representante;
use notascole\Estudiante;
use Illuminate\Support\Facades\Auth;

class ListadoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idUsuario = Auth::user()->id;
        $tipoentidad = Auth::user()->tipo_entidad;
        $idEntidad = Auth::user()->entidad_id;
        $anhiosLectivos = AnhioLectivo::where('enabled','=','*')->get();
        $count_anhios = count($anhiosLectivos);
        if($count_anhios>1)
        {
            return view('consulta.anhiolectivo',compact('anhiosLectivos'));
        }else
        {
            $tipoentidad = Auth::user()->tipo_entidad;
            if($tipoentidad === 'E')
            {
                $estudiante = Estudiante::find($idEntidad);
                return view('consulta.listado')->with('estudiante',$estudiante)
                                               ->with('anhiolectivo',$anhiosLectivos[0]);

            }else if($tipoentidad === 'R'){
                $representante = Representante::find($idEntidad);
                $count_estudiantes = $representante->representadosCount()->first()->contador;
                if($count_estudiantes<>1){
                    return view('consulta.estudiante')->with('estudiantes',$representante->estudiantes)
                                                      ->with('representante',$count_estudiantes);
                }else{
                    $estudiante = $representante->estudiantes()->first();
                    return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0])
                                               ->with('estudiante',$estudiante);
                }
            }else{
                $estudiante = Estudiante::find($idEntidad);
                return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0])
                                               ->with('estudiante',$estudiante);
            }
        }
    }


}
