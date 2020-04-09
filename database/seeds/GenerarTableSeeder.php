<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
class GenerarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Product::truncate();

        $categoria = new Category;
        $categoria->nombre = 'Categoria 1';
        $categoria->descripcion = 'Descripción 1';
        $categoria->save();

        $categoria = new Category;
        $categoria->nombre = 'Categoria 2';
        $categoria->descripcion = 'Descripción 2';
        $categoria->save();

        $categoria = new Category;
        $categoria->nombre = 'Categoria 3';
        $categoria->descripcion = 'Descripción 3';
        $categoria->save();

        $categoria = new Category;
        $categoria->nombre = 'Categoria 4';
        $categoria->descripcion = 'Descripción 4';
        $categoria->save();

        $categoria = new Category;
        $categoria->nombre = 'Categoria 5';
        $categoria->descripcion = 'Descripción 5';
        $categoria->save();

        $producto = new Product;
        $producto->codigo = '123456';
        $producto->nombre = 'Producto 1';
        $producto->precio = 12.5;
        $producto->descripcion = 'Descripción 1';
        $producto->save();
        $producto->categorias()->attach(Category::find(1));

        $producto = new Product;
        $producto->codigo = '123457';
        $producto->nombre = 'Producto 2';
        $producto->precio = 15.5;
        $producto->descripcion = 'Descripción 2';
        $producto->save();
        $producto->categorias()->attach(Category::find(2));

        $producto = new Product;
        $producto->codigo = '123458';
        $producto->nombre = 'Producto 3';
        $producto->precio = 22.5;
        $producto->descripcion = 'Descripción 3';
        $producto->save();
        $producto->categorias()->attach(Category::find(3));

        $producto = new Product;
        $producto->codigo = '123454';
        $producto->nombre = 'Producto 4';
        $producto->precio = 12.5;
        $producto->descripcion = 'Descripción 4';
        $producto->save();
        $producto->categorias()->attach(Category::find(4));

        $producto = new Product;
        $producto->codigo = '123455';
        $producto->nombre = 'Producto 5';
        $producto->precio = 15.5;
        $producto->descripcion = 'Descripción 5';
        $producto->save();
        $producto->categorias()->attach(Category::find(5));    
    }
}