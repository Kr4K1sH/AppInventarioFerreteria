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

            /* Acuerdese que significa el numero 1 que es el ID del producto y se lo agregamos a cantidad asi se agrega una tabla pivote con campos adicionales */
           $location->Products()->attach([
             1=>['cantidad'=>'30'],
             3=>['cantidad'=>'50'],
             6=>['cantidad'=>'75']
             ]);




        $location = new \App\Models\Location();
        $location->descripcion = 'Bodega';
        $location->estado = true;
        $location->save();

        $location->Products()->attach([
            2 => ['cantidad' => '15'],
            4 => ['cantidad' => '35'],
            5 => ['cantidad' => '42']
        ]);

    }
}
