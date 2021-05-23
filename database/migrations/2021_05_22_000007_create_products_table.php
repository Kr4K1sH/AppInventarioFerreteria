<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->text('descripcion');
            $table->integer('cantidad_maxima');
            $table->integer('cantidad_minima');
            $table->integer('cantidad_total');
            $table->decimal('costo_unidad', 8, 2);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('display_id');
            $table->unsignedInteger('user_id');
            $table->decimal('peso', 8, 2);
            $table->string('color', 20);
            $table->string('imagen', 2000);

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('display_id')->references('id')->on('displays');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('categories_products_category_id_foreign');
            $table->dropForeign('displays_products_display_id_foreign');
            $table->dropForeign('users_products_user_id_foreign');
        });

        Schema::dropIfExists('products');
    }
}
