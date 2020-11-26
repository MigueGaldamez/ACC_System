<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';
    public function hojastrabajos()
    {
        return $this->belongsToMany(HojaTrabajo::class,'detalle_hoja_trabajos','empleado_id','hojatrabajo_id');
    }
}
