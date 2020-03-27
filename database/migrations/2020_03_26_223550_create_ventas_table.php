<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante')->nullable();
            $table->string('numero_comprobante');
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 4,2);
            $table->decimal('total', 11,2);
            $table->string('estado');

            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
