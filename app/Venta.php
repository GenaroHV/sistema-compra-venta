<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'cliente_id',
        'user_id',
        'tipo_comprobante',
        'serie_comprobante',
        'numero_comprobante',
        'fecha_hora',
        'impuesto',
        'total',
        'estado'
    ];

    # El usuario vende
    public function usuario(){
        return $this->belongsTo(User::class);
    }

    # El cliente compra
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
