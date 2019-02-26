<?php

namespace notascole\Http\Controllers;

use Illuminate\Http\Request;
use notascole\AnhioLectivo;
use notascole\Representante;
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
        $estudiante = Auth::user();
        $anhiosLectivos = AnhioLectivo::where('enabled','=','*')->get();
        $count_anhios = count($anhiosLectivos);
        if($count_anhios>1)
        {
            return view('consulta.anhiolectivo',compact('anhiosLectivos'));
        }else
        {
            $tipoentidad = Auth::user()->tipoentidad;
            if($tipoentidad === 'E')
            {
                $estudiante = Auth::user();
                return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0])
                                               ->with('estudiante',$estudiante);
            }else if($tipoentidad === 'R'){
                $id = Auth::user()->entidad_id;
                $representante = Representante::find($id);
                $count_estudiantes = Representante::has('representados')->count();
                if($count_estudiantes<>1){
                    return view('consulta.estudiante')->with('estudiantes',$representante->representados)
                                                      ->with('representante',$representante);
                }else{
                    return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0])
                                               ->with('estudiante',$estudiante);
                }
            }
        }
    }

}
