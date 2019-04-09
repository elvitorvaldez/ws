<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Califica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;


class CalificacionesController extends Controller
{
    public function index(Request $request)
    {

  
	$idAlumno = $request->idAlumno;
       
    	$users = DB::table("t_alumnos")
            ->join("t_calificaciones", "t_alumnos.id_t_usuarios", "=", "t_calificaciones.id_t_usuarios")
            ->join("t_materias", "t_materias.id_t_materias", "=", "t_calificaciones.id_t_materias")
            ->select("t_alumnos.id_t_usuarios", "t_alumnos.nombre as nombre", "t_alumnos.ap_paterno", "t_alumnos.ap_materno","t_materias.nombre as materia", "t_calificaciones.calificacion")  
            ->selectRaw("DATE_FORMAT(t_calificaciones.fecha_registro,'%d-%m-%Y') as fecha_registro")
            ->where('t_alumnos.id_t_usuarios', '=', $idAlumno)
            ->get();

        $promedio = DB::table("t_alumnos")
            ->join("t_calificaciones", "t_alumnos.id_t_usuarios", "=", "t_calificaciones.id_t_usuarios")
            ->join("t_materias", "t_materias.id_t_materias", "=", "t_calificaciones.id_t_materias")
             ->select(DB::raw('AVG(t_calificaciones.calificacion) as promedio'))
             ->where('t_alumnos.id_t_usuarios', '=', $idAlumno)
            ->get();    

        

     $exito = array_merge(json_decode($users, true),json_decode($promedio, true));
     return  $exito;

    }

    public function store(Request $request)
    {
    	$retorno = "";
        $fecha = date("Y-m-d");

    if ($request->id_t_materias=="" && $request->id_t_usuario=="" && $request->id_t_calificacion=="")
    {
		$retorno = Response::json(array("success"=>"error" , "msg"=>"no se recibieron datos"));
	}


	else 
   	{ 

		
	    $inserted = DB::table('t_calificaciones')->insert([	    	
			'id_t_materias' => $request->id_t_materias,
			'id_t_usuarios' => $request->id_t_usuarios,
			'calificacion' => $request->calificacion,
			'fecha_registro' => $fecha
			]);

			 
			$retorno = Response::json(array("success"=>"ok" , "msg"=>"calificacion registrada"));
		
				
	  }
        return $retorno;	
    }


    public function show()
    {
      //  
    }


    public function update(Request $request)
    {
    	$retorno="";
    	 if ($request->calificacion=="" && $request->id_t_calificacion=="")
		    {
				$retorno = Response::json(array("success"=>"error" , "msg"=>"no se recibieron datos"));
			}

			else
			{
		        DB::table('t_calificaciones')
			    ->where('id_t_calificaciones', $request->id_t_calificacion)
			    ->update(['calificacion' => $request->calificacion]);
			    $retorno = Response::json(array("success"=>"ok" , "msg"=>"calificacion actualizada"));
			}
	return $retorno;
    }




    public function destroy(Request $request)
    {

    	$retorno="";
    	 if ($request->id_t_calificacion=="")
		    {
				$retorno = Response::json(array("success"=>"error" , "msg"=>"no se recibieron datos"));
			}

			else
			{
        DB::table('t_calificaciones')->where('id_t_calificaciones', '=', $request->id_t_calificacion)->delete();
        $retorno = Response::json(array("success"=>"ok" , "msg"=>"calificacion eliminada"));
    
    }
    return $retorno;
    }
}
