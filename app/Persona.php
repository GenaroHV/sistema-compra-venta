<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre',
        'tipo_persona',
        'tipo_documento', 
        'numero_documento', 
        'direccion', 
        'telefono', 
        'email'
    ];

    public function proveedor(){
        return $this->hasOne(Proveedor::class);
    }
}
