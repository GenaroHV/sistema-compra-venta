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
        $empresa->propietario = 'Juan Perez';
        $empresa->ruc = '10480549053';
        $empresa->telefono = '999999999';
        $empresa->email = 'aprendamos@juntos.com';
        $empresa->save();
    }
}
