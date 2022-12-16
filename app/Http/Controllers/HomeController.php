<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Categorias;
use App\Models\Videojuegos;
use App\Models\Aulas;
use App\Models\Horarios;

use Illuminate\Http\Request;

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
        return view('home');
    }
}

class DashboardControlador{

    static public function ctrGetDatosDashboard(){

        $datos = DashboardModelo::mdlGetDatosDashboard();

        return $datos;
    }
}
