<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::truncate();
        $empresa = new Empresa;
        $empresa->razon_social = 'Aprendamos Juntos S.A.';
        $empresa->rubro = 'Clases online';
        $empresa->ruc = '1048054905';
        $empresa->telefono = '999999999';
        $empresa->email = 'aprendamos@juntos.com';
        $empresa->direccion = 'San Vicente';
        $empresa->ciudad = 'Lima';
        $empresa->provincia = 'Cañete';
        $empresa->save();
    }
}
