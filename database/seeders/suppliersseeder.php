<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class suppliersseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1  Empresa de herramientas de iluminacion
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Adir';
        $supplier->direccion = 'Miguel Hidalgo, Col. Urbana Ixhuatepec, Ecatepec de Morelos, Edo. De México';
        $supplier->pais = 'MEX';
        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([1]);
        $supplier->Products()->attach([
            2 => ['id' => '1']
        ]);

        // 2 Empresa herramientas de contruccion todo tipo
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Truper';
        $supplier->direccion = 'Ciudad de Mexico, Ciudad de Mexico, Mexico';
        $supplier->pais = 'MEX';

        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([2]);
        $supplier->Products()->attach([
            1 => ['id' => '2']
        ]);

        // 3 heramientas de contruccion de todo tipo
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = '3M';
        $supplier->direccion = 'La Asuncion, Heredia';
        $supplier->pais = 'CRC';

        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([3]);
        $supplier->Products()->attach([
            1 => ['id' => '3']
        ]);


        //4 empresa para jardineria
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Ever Green';
        $supplier->direccion = 'Rincon Grande de Pavas, frente al final del plantel del ICE, bodega Rincón Grande # 3';
        $supplier->pais = 'CRC';

        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([4]);
        $supplier->Products()->attach([
            4 => ['id' => '4']
        ]);


        //5 empresa para el hogar cosas de higiene
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'BioTec';
        $supplier->direccion = 'Complejo de bodegas de la antigua fábrica Bayer, bodega #4. Calle Blancos, San José, Costa Rica';
        $supplier->pais = 'CRC';

        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([5]);
        $supplier->Products()->attach([
            3 => ['id' => '5']
        ]);

        //6 empresa fontaneria
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Durman';
        $supplier->direccion = 'Zona Franca Pro Park, al costado oeste de la Dos Pinos, Coyol, Alajuela';
        $supplier->pais = 'CRC';

        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([6]);
        $supplier->Products()->attach([
            5 => ['id' => '6']
        ]);

        //7 empresa Pintura
        $supplier = new \App\Models\Supplier();
        $supplier->nombre = 'Lanco';
        $supplier->direccion = 'Zona Franca Pro Park, al costado oeste de la Dos Pinos, Coyol, Alajuela';
        $supplier->pais = 'CRC';
        $supplier->save();
        #//se agregan relaciones
        $supplier->Contacts()->attach([7]);
        $supplier->Products()->attach([
            6 => ['id' => '7']
        ]);
    }
}
