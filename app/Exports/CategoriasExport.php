<?php

namespace App\Exports;

use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class CategoriasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return Category::select(\DB::raw("'',id, nombre, descripcion"))->get();
    }
    public function headings(): array
    {
        return [
            ' ',
            '#',
            'Nombre',
            'Descripción'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'B1:D1'; // Rango de celdas
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true)->setSize(13);
            },
        ];
    }
    public function title(): string
    {
        return 'Categorias';
    }
}
