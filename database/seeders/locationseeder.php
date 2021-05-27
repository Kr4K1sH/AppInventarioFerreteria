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

/*
 $table->string('descripcion', 45);
            $table->boolean('estado')->default(false);
            $table->timestamps();
*/
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
