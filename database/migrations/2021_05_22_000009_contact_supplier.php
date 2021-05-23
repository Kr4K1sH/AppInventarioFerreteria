<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_supplier', function(Blueprint $table){
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('contact_id');

            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_supplier', function (Blueprint $table) {
            $table->dropForeign('contact_supplier_supplier_id_foreign');
            $table->dropForeign('contact_supplier_contact_id_foreign');
        });
        Schema::dropIfExists('contact_supplier');
    }
}
