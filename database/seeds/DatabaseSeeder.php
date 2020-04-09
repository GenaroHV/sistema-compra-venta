<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(GenerarTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
