<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingresos';
    protected $fillable = [
        'ingreso_id',
        'producto_id',
        'cantidad',
        'precio'
    ];
    public $timestamps = false;
}
