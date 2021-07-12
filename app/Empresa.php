<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $table = 'empresas';
    protected $fillable = [
        'razon_social',
        'propietario',
        'ruc',
        'logo',
        'telefono',
        'email',
        'igv',
        'moneda',
        'direccion',
    ];
}
