<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaTrabajo extends Model
{
    protected $table = 'hoja_trabajos';
    public function empleados()
    {
        return $this->belongsToMany(HojaTrabajo::class,'detalle_hoja_trabajos','hojatrabajo_id','empleado_id');
    }
}
