<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificacion', 9);
            $table->string('name', 45);
            $table->string('primerApellido', 45);
            $table->string('segundoApellido', 45);
            $table->boolean('estado')->default(false);
            $table->string('email', 45)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto', 2000);
            $table->rememberToken();
            $table->unsignedInteger('perfil_id');
            $table->timestamps();

            $table->foreign('perfil_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_profiles_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
