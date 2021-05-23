<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inventory', function(Blueprint $table){
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
        Schema::table('product_inventory', function (Blueprint $table) {
            $table->dropForeign('product_inventory_inventory_id_foreign');
            $table->dropForeign('product_inventory_product_id_foreign');
        });
        Schema::dropIfExists('product_inventory');
    }
}
