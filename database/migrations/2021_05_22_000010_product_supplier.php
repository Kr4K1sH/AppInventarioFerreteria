<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_supplier', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
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
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->dropForeign('product_supplier_supplier_id_foreign');
            $table->dropForeign('product_supplier_product_id_foreign');
        });
        Schema::dropIfExists('product_supplier');
    }
}
