<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 45);
            $table->unsignedInteger('movementtype_id');
            $table->timestamps();

            $table->foreign('movementtype_id')->references('id')->on('movementtypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movements', function(Blueprint $table){
            $table->dropForeign('movements_movementtype_id_foreign');
        });

        Schema::dropIfExists('movements');
    }
}
