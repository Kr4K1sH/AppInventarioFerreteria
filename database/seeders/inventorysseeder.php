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
        //1

        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '1';
        $inventory->description = 'Compra materiales 10 galones de pintura lanco';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';

        $inventory->save();

        $inventory->Products()->attach([
            1 => ['cantidad' => '10', 'product_supplier_id' => '3', 'product_location_id' => '1']
        ]);
        

        //$inventory->Supplier->product_supplier_id = '3';
        //$inventory->product_location_id = '1';

        //2
        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '2';
        $inventory->description = 'traspaso de materiales en mal estado barras led general electric';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';

        $inventory->save();

        $inventory->Products()->attach([
            2 => ['cantidad' =>'35', 'product_supplier_id' => '7', 'product_location_id' => '2']
        ]);
        //$inventory->product_supplier_id = '7';
        //$inventory->product_location_id = '2';


        //3
        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '1';
        $inventory->description = 'Devolucion de ceramica en mal estado rota 2 cajas';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';

        $inventory->save();

        $inventory->Products()->attach([
            3 => ['cantidad' =>'2', 'product_supplier_id' => '5', 'product_location_id' => '2']
        ]);
        //$inventory->product_supplier_id = '5';
        //$inventory->product_location_id = '2';



        //4
        $inventory = new \App\Models\Inventory();
        $inventory->movement_id = '2';
        $inventory->description = 'devolucion de costales de abono rotos a proveedor';
        $inventory->fecha = Carbon::today();
        $inventory->user_id = '1';

        $inventory->save();
        $inventory->Products()->attach([
            4 => ['cantidad' =>'30', 'product_supplier_id' => '5', 'product_location_id' => '1']
        ]);

        //$inventory->product_supplier_id = '5';
        //$inventory->product_location_id = '1';
    }
}
