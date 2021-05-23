<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movement_id');
            $table->string('description');
            $table->date('fecha');
            $table->unsignedInteger('user_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('movement_id')->references('id')->on('movements');
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
        Schema::table('inventories', function(Blueprint $table){
            $table->dropForeign('inventories_movement_id_foreign');
            $table->dropForeign('inventories_user_id_foreign');
        });

        Schema::dropIfExists('inventories');
    }
}
