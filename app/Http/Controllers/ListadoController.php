<?php

namespace notascole\Http\Controllers;

use Illuminate\Http\Request;
use notascole\AnhioLectivo;
use notascole\Representante;
use notascole\Estudiante;
use notascole\Calificacion;
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
                                                      ->with('representante',$representante)
                                                      ->with('anhiolectivo',$anhiosLectivos[0]);
                }else{
                    /*
                    $estudiante = $representante->estudiantes()->first();
                    return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0])
                                               ->with('estudiante',$estudiante);
                    */
                    return redirect()->route('notas', ['inicioanhioLectivo' => $anhiosLectivos[0]->inicio,
                                                       'estudianteId' => $representante->estudiantes()->first()->id]);
                }
            }else{
                /*
                $estudiante = Estudiante::find($idEntidad);
                return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0])
                                               ->with('estudiante',$estudiante);
                */
                return redirect()->route('notas', ['inicioanhioLectivo' => $anhiosLectivos[0]->inicio,
                                                   'estudianteId' => $representante->estudiantes()->first()->id]);
            }
        }
    }

    public function notas($inicioanhioLectivo,$estudianteId)
    {
        $estudiante = Estudiante::find($estudianteId);
        $anhioLectivo = AnhioLectivo::find($inicioanhioLectivo);

        if($anhioLectivo === null){
            return abort(404);
        }else{
            if(!($anhioLectivo->enabled === '*')){
                return abort(404);
            }
        }

        if($estudiante === null){
            return abort(404);
        }else{
            if(Auth::user()->tipo_entidad === 'E'){
                if(!(Auth::user()->id === $estudiante->id)){
                    return abort(404);
                }
            }else if(Auth::user()->tipo_entidad === 'R'){
                $representante = Representante::find(Auth::user()->entidad_id);
                $exists = $representante->estudiantes->contains($estudianteId);
                if(!($exists === true)){
                    return abort(404);
                }
            }
        }

        $notas = Calificacion::where([
            ['estudiante_id', '=', $estudiante->id],
            ['curso_id', '=', $estudiante->curso_id],
                                    ])->get();
        return view('consulta.listado')->with('anhiolectivo',$anhioLectivo)
                                       ->with('estudiante',$estudiante)
                                       ->with('notas',$notas);
    }


}
