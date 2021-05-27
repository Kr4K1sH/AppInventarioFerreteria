<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class product_locationseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /*
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('product_id');
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('product_id')->references('id')->on('products');

*/
// preguntar si esta tabla se debe de hacer

        //SUCURSAL

        $product_location = new \App\Models\ProductLocation();
        $product_location->location_id = '1';
        $product_location->product_id = '2';
        $product_location->cantidad = '20';

        $product_location->save();

        $product_location = new \App\Models\ProductLocation();
        $product_location->location_id = '1';
        $product_location->product_id = '4';
        $product_location->cantidad = '50';

        $product_location->save();

        $product_location = new \App\Models\ProductLocation();
        $product_location->location_id = '1';
        $product_location->product_id = '5';
        $product_location->cantidad = '250';

        $product_location->save();




 //BODEGA
        $product_location = new \App\Models\ProductLocation();
        $product_location->location_id='2';
        $product_location->product_id='1';
        $product_location->cantidad='100';

        $product_location->save();

        $product_location = new \App\Models\ProductLocation();
        $product_location->location_id = '2';
        $product_location->product_id = '3';
        $product_location->cantidad = '150';

        $product_location->save();

        $product_location = new \App\Models\ProductLocation();
        $product_location->location_id = '2';
        $product_location->product_id = '6';
        $product_location->cantidad = '70';

        $product_location->save();


    }
}
