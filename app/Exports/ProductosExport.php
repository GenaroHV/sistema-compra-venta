<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProductosExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{
    public function collection(){
        return Product::with('categorias')->get();
    }
    // Mapa de datos
    public function map($producto): array{
        #dd($producto->categorias->first()->nombre);
        $categoria = '';
        foreach($producto->categorias as $categoria)
        { 
            $categoria = $categoria->nombre;
        }
        return [
            ' ',
            $producto->id,
            $producto->codigo,
            $producto->nombre,
            $producto->descripcion,
            $producto->stock,
            $producto->precio,
            $categoria
        ];
    }
    // Titulos de columnas
    public function headings(): array
    {
        return [
            ' ',
            '#',
            'Código',
            'Nombre',
            'Descripción',
            'Stock',
            'Precio',
            'Categoria'
        ];
    }    
    // Estilos     
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'B1:H1'; // Rango de celdas
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true)->setSize(13);
            },
        ];
    }
    // Titulo de hoja de cálculo
    public function title(): string
    {
        return 'Productos';
    }
    
}
