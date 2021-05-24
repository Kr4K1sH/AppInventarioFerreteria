<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class suppliers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empresa de herramientas de iluminacion
        $supplier = new \App\Models\Supplier();
        $supplier->nombre='Adir';
        $supplier->direccion= 'Miguel Hidalgo, Col. Urbana Ixhuatepec, Ecatepec de Morelos, Edo. De México';
        $supplier->pais='MEX';
        $supplier->save();

     //Empresa herramientas de contruccion todo tipo
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Truper';
        $supplier->direccion = 'Ciudad de Mexico, Ciudad de Mexico, Mexico';
        $supplier->pais = 'MEX';

        $supplier->save();

        //heramientas de contruccion de todo tipo
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = '3M';
        $supplier->direccion = 'La Asuncion, Heredia';
        $supplier->pais = 'CRC';

        $supplier->save();

        //empresa para jardineria
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Ever Green';
        $supplier->direccion = 'Rincon Grande de Pavas, frente al final del plantel del ICE, bodega Rincón Grande # 3';
        $supplier->pais = 'CRC';

        $supplier->save();


        //empresa para el hogar cosas de higiene
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'BioTec';
        $supplier->direccion = 'Complejo de bodegas de la antigua fábrica Bayer, bodega #4. Calle Blancos, San José, Costa Rica';
        $supplier->pais = 'CRC';

        $supplier->save();

        //empresa fontaneria
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Durman';
        $supplier->direccion = 'Zona Franca Pro Park, al costado oeste de la Dos Pinos, Coyol, Alajuela';
        $supplier->pais = 'CRC';

        $supplier->save();

        //empresa pintura
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Lanco';
        $supplier->direccion = 'Zona Franca Pro Park, al costado oeste de la Dos Pinos, Coyol, Alajuela';
        $supplier->pais = 'CRC';
        $supplier->save();

    }
}
