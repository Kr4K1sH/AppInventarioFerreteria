<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class movementtypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $movements = new \App\Models\Movementtypes();
        $movements->nombre= 'entrada';
         $movements->save();

        $movements = new \App\Models\Movementtypes();
        $movements->nombre = 'salida';
        $movements->save();



        // Salidas



    }
}
