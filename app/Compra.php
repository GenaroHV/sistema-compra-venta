<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'proveedor_id',
        'user_id',
        'tipo_comprobante',
        'serie_comprobante',
        'numero_comprobante',
        'fecha_hora',
        'impuesto',
        'total',
        'estado'
    ];

    # El usuario compra
    public function usuario(){
        return $this->belongsTo(User::class);
    }

    # El proveedor vende
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
