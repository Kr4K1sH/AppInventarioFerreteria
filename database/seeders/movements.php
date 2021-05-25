<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class movements extends Seeder
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
        $movements->descripcion= 'compra';
        $movements->movementtype_id = '1';

        $movements->save();
    

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'devolución';
        $movements->movementtype_id = '1';

        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'entrada por ajuste a inventario';
        $movements->movementtype_id='1';

        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'entrada por traspaso';
        $movements->movementtype_id = '1';
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'inventario inicial entre otros';
        $movements->movementtype_id = '1';

        $movements->save();


        //salidas
        $movements = new \App\Models\Movement();
        $movements->descripcion = 'factura';
        $movements->movementtype_id = '2';

        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'cancelación de compra';
        $movements->movementtype_id = '2';
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'devolución de compra a proveedor';
        $movements->movementtype_id = 2;
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'salida por ajuste de inventario';
        $movements->movementtype_id = '2';
        $movements->save();

        $movements = new \App\Models\Movement();
        $movements->descripcion = 'salida por traspaso';
        $movements->movementtype_id = '2';
        $movements->save();

    }
}

