<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class movementsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

// Entradas:  compra, devolución, entrada por ajuste a
//inventario, entrada por traspaso, inventario inicial entre otros

//Salidas : factura, cancelación de compra, devolución de
//compra a proveedor, salida por ajuste de inventario, salida por traspaso,

//entradas
        $movements = new \App\Models\Movement();
        $movements->descripcion= 'Compra';
        $movements->movementtype_id = '1';

        $movements->save();



        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Devolución';
        $movements->movementtype_id = '1';

        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Entrada por ajuste a inventario';
        $movements->movementtype_id='1';

        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Entrada por traspaso';
        $movements->movementtype_id = '1';
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Inventario inicial entre otros';
        $movements->movementtype_id = '1';

        $movements->save();


        //salidas
        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Factura';
        $movements->movementtype_id = '2';

        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Cancelación de compra';
        $movements->movementtype_id = '2';
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Devolución de compra a proveedor';
        $movements->movementtype_id = 2;
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Salida por ajuste de inventario';
        $movements->movementtype_id = '2';
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'Salida por traspaso';
        $movements->movementtype_id = '2';
        $movements->save();

    }
}

