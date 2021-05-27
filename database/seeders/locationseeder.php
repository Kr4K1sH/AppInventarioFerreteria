<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class locationseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          $location = new \App\Models\Location();
           $location->descripcion='Sucursal';
           $location->estado=true;
           $location->save();


            $location = new \App\Models\Location();
            $location->descripcion = 'Bodega';
            $location->estado = true;
            $location->save();


    }
}
