<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio', 11,2);
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
        Schema::dropIfExists('detalle_ventas');
    }
}
