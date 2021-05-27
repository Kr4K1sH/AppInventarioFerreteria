<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_product', function(Blueprint $table){
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
        Schema::table('product_location', function (Blueprint $table) {
            $table->dropForeign('product_location_location_id_foreign');
            $table->dropForeign('product_location_product_id_foreign');
        });
        Schema::dropIfExists('product_location');
    }
}
