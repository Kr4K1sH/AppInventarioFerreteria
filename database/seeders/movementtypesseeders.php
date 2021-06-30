<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class movementtypesseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $movements = new \App\Models\Movementtypes();
        $movements->nombre= 'Entrada';
         $movements->save();

        $movements = new \App\Models\Movementtypes();
        $movements->nombre = 'Salida';
        $movements->save();






    }
}
