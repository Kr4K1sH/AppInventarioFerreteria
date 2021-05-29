<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class inventoriesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////
        /*
        $table->unsignedInteger('movement_id');
        $table->string('description');
        $table->date('fecha');
        $table->unsignedInteger('user_id');
        $table->integer('cantidad');
        $table->timestamps();

        $table->foreign('movement_id')->references('id')->on('movements');
        $table->foreign('user_id')->references('id')->on('users');
*/

        //Las fechas estan en UTC;


        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '1';
        $inventory->description = 'Compra materiales 10 galones de pintura lanco';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';
        $inventory->cantidad = 10;

        $inventory->save();


        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '2';
        $inventory->description = 'traspaso de materiales en mal estado barras led general electric';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';
        $inventory->cantidad = 35;

        $inventory->save();


        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '1';
        $inventory->description = 'Devolucion de ceramica en mal estado rota 2 cajas';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';
        $inventory->cantidad = 2;

        $inventory->save();


        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '2';
        $inventory->description = 'devolucion de costales de abono rotos a proveedor';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';
        $inventory->cantidad = 30;

        $inventory->save();



    }
}
