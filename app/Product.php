<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'precio',
        'stock',
        'avatar',
        'descripcion'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Category::class);
    }
}
