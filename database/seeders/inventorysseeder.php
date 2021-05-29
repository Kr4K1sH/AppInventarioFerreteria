<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class inventorysseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

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
