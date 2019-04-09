<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class EmpleadosController extends Controller
{
    public function index()
    {
        return Empleado::all();
    }


    public function show($idEmpleado)
    {
        return Empleado::findOrFail($idEmpleado);
    }


    public function store(Request $request)
    {
        $retorno = "";
       
    if ($request->nombre=="" || $request->email=="" || $request->puesto=="" || $request->fecha_nac=="" || $request->domicilio=="" || $request->skill1== || ""$request->cal1=="" || $request->skill2=="" || $request->cal2=="")
    {
        $retorno = Response::json(array("success"=>"error" , "msg"=>"no se recibieron datos"));
    }


    else 
    { 

        
        $inserted = DB::table('t_empleados')->insert([         
            'nombre' => $request->nombre,
            'email' => $request->email,
            'puesto' => $request->puesto,
            'fecha_nac' => $request->fecha_nac,
            'domicilio' => $domicilio,
            'skill1' => $skill1,
            'cal1' => $cal1,
            'skill2' => $skill2,
            'cal2' => $cal2,
            ]);

             
            $retorno = Response::json(array("success"=>"ok" , "msg"=>"Empleado creado correctamente"));
        
                
      }
        return $retorno;    
    }

   /* public function update($EmpleadoId)
    {
        Empleado::findOrFail($EmpleadoId)->update(Input::all());
    }


    public function destroy($id)
    {
        Empleado::findOrFail($id)->delete();
    }*/
}
