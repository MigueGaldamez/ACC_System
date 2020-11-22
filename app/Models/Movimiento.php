<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'idMovimiento';
    public function detalles()
    {
            return $this->hasMany(Detalle::class);
    }
}

