<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER UpdateTriggerStockCompra AFTER INSERT ON detalle_compras FOR EACH ROW BEGIN
                UPDATE products SET stock = stock + NEW.cantidad WHERE products.id = NEW.producto_id;
            END
        ');
        DB::unprepared('
            CREATE TRIGGER UpdateTriggerStockCompraAnular AFTER UPDATE ON compras FOR EACH ROW BEGIN
                UPDATE products p JOIN detalle_compras dc ON dc.producto_id = p.id AND dc.compra_id = new.id SET p.stock = p.stock - dc.cantidad;
            END
        ');
        DB::unprepared('
            CREATE TRIGGER UpdateTriggerStockVenta AFTER INSERT ON detalle_ventas FOR EACH ROW BEGIN
                UPDATE products SET stock = stock - NEW.cantidad WHERE products.id = NEW.producto_id;
            END
        ');
        DB::unprepared('
            CREATE TRIGGER UpdateTriggerStockVentaAnular AFTER UPDATE ON ventas FOR EACH ROW BEGIN
                UPDATE products p JOIN detalle_ventas dv ON dv.producto_id = p.id AND dv.venta_id = new.id set p.stock = p.stock + dv.cantidad;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `UpdateTriggerStockCompra`');
        DB::unprepared('DROP TRIGGER `UpdateTriggerStockCompraAnular`');
        DB::unprepared('DROP TRIGGER `UpdateTriggerStockVenta`');
        DB::unprepared('DROP TRIGGER `UpdateTriggerStockVentaAnular`');
    }
}
