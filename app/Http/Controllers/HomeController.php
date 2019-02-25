<?php

namespace notascole\Http\Controllers;

use Illuminate\Http\Request;
use notascole\AnhioLectivo;

class HomeController extends Controller
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
        // /*
        $anhiosLectivos = AnhioLectivo::where('enabled','=','*')->get();
        // */
        return view('home',compact('anhiosLectivos'));
    }
}
