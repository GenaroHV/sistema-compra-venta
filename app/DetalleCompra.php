<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_compras';
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
        'precio'
    ];
    public $timestamps = false;
}
