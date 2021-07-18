<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_product', function (Blueprint $table) {
            $table->unsignedInteger('inventory_id');
            $table->unsignedInteger('product_id');
            //$table->unsignedInteger('product_supplier_id');
            //$table->unsignedInteger('product_location_id');
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('product_id')->references('id')->on('products');
            //$table->foreign('product_supplier_id')->references('id')->on('product_supplier');
            //$table->foreign('product_location_id')->references('id')->on('location_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_product', function (Blueprint $table) {
            $table->dropForeign('inventory_product_inventory_id_foreign');
            $table->dropForeign('inventory_product_product_id_foreign');
            //$table->dropForeign('inventory_product_product_supplier_id_foreign');
            //$table->dropForeign('inventory_product_product_location_id_foreign');
        });
        Schema::dropIfExists('inventory_product');
    }
}
