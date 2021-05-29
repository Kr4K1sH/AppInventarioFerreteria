<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoriesProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories_product', function (Blueprint $table) {
            $table->unsignedInteger('inventory_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventories_product', function (Blueprint $table) {
            $table->dropForeign('inventory_product_inventory_id_foreign');
            $table->dropForeign('inventory_product_product_id_foreign');
        });
        Schema::dropIfExists('inventory_product');
    }
}
