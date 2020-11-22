<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'detalles';
    protected $primaryKey = 'iddetalle';
    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class,'idMovimiento','idMovimiento');
    }
    public function cuentas()
    {
        return $this->belongsTo(Cuentas::class,'idCuenta');
    }
}
