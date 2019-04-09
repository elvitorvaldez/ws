<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	public $table = "t_empleados";
	protected $primaryKey = 'id_t_empleado';
    protected $fillable = ['id_t_empleado,nombre,email,puesto,fecha_nac,domicilio,skill1,cal1,skill2,cal2'];
}
