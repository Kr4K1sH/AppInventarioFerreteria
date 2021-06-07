<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LocationProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_product', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('product_id');
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::table('location_product', function (Blueprint $table) {
            $table->dropForeign('location_product_location_id_foreign');
            $table->dropForeign('location_product_product_id_foreign');
        });
        Schema::dropIfExists('location_product');
    }
}
