<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aula;
use App\Models\Categoria;
use App\Models\Equipo;
use App\Models\Horario;
use App\Models\Inscripciongr;
use App\Models\Inscripcionin;
use App\Models\Jugadore;
use App\Models\Partidagr;
use App\Models\Partidain;
use App\Models\Videojuego;


class DashboardController extends Controller
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

        $sumas = $this->sumas();
        $data = $this->Graficas();

        return view('dashboard.home',[
            'sumas'=>$sumas,
        ],$data);
    }
    public function Sumas()
    {
        $individual= Inscripcionin::all()->count();
        $grupal= Inscripciongr::all()->count();

        $contar = [
            'total_videojuegos' => Videojuego::all()->count(), 
            'total_jugadores' => Jugadore::all()->count(), 
            'total_aulas' => Aula::all()->count(), 
            'total_equipos' => Equipo::all()->count(), 
            'total_horarios' => Horario::all()->count(), 
            'total_inscripcionIndi' => Inscripcionin::all()->count(), 
            'total_inscripcionGru' => Inscripciongr::all()->count(),
            'total_inscripciones' => round($individual + $grupal),  
        ];
        return $contar;
    }
    public function Graficas(){
    
        $videojuegos = Videojuego::ALL();
        
        $carreras=DB::select('SELECT nombre FROM videojuegos where videojuegos.categoria_id like "1"');
        $shooters=DB::select('SELECT nombre FROM videojuegos where videojuegos.categoria_id like "2"');

        $id1=DB::select('SELECT id FROM videojuegos where videojuegos.categoria_id like "1"');
        $id2=DB::select('SELECT id FROM videojuegos where videojuegos.categoria_id like "2"');
        
        for($i=0; $i < sizeof($carreras);$i++){
            $aux = Inscripcionin::all()->where('videojuego_id', $id1[$i]->id)->count(); 
            $aux2 = Inscripciongr::all()->where('videojuego_id',$id1[$i]->id) ->count();
            $data['label'][] = $carreras[$i]->nombre;
            $data['data'][] = $aux + $aux2; 
        }

        for($i=0; $i < sizeof($shooters);$i++){
            $aux3 = Inscripcionin::all()->where('videojuego_id', $id2[$i]->id)->count(); 
            $aux4 = Inscripciongr::all()->where('videojuego_id',$id2[$i]->id) ->count();
            $data['labelc'][] = $shooters[$i]->nombre;
            $data['datac'][] = $aux3 + $aux4; 
        }

        $data['data'] = json_encode($data);
        
        return $data;
    }
}