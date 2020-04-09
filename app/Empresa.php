<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = [
        'razon_social',
        'rubro',
        'descripcion',
        'ruc',
        'logo',
        'telefono',
        'email',
        'igv',
        'moneda',
        'direccion',
        'ciudad',
        'provincia',
    ];
}
