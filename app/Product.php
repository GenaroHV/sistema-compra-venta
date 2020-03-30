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

    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this)){
            return $query;
        }
        return $query->where('id', auth()->id());
    }
}
