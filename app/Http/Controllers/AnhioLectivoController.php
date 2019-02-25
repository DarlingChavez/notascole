<?php

namespace notascole\Http\Controllers;

use Illuminate\Http\Request;
use notascole\AnhioLectivo;
use notascole\Representante;

class AnhioLectivoController extends Controller
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

        $anhiosLectivos = AnhioLectivo::where('enabled','=','*')->get();
        $count = count($anhiosLectivos);
        if($count>1)
        {
            return view('consulta.anhiolectivo',compact('anhiosLectivos'));
        }else
        {
            $tipoentidad = Auth::user()->tipoentidad;
            if($tipoentidad === 'E')
            {
                $estudiante = Auth::user();
            }else if($tipoentidad === 'R'){
                $id = Auth::user()->entidad_id;
                $representante = Representante::find($id);
            }
            return view('consulta.listado')->with('anhiolectivo',$anhiosLectivos[0]);
        }




    }
}
