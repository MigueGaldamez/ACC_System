<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHojaTrabajo extends Model
{
    protected $table = 'detalle_hoja_trabajos';

    public function hojatrabajos()
    {
        return $this->belongsTo(HojaTrabajo::class,'hojatrabajo_id');
    }
    public function empleados()
    {
        return $this->belongsTo(Empleados::class,'empleado_id');
    }
}
