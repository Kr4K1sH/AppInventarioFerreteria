<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class profiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new \App\Models\Profile();
        $profile->descripcion='administrador';
        $profile-> save();

        $profile1 = new \App\Models\Profile();
        $profile1->descripcion = 'encargado';
        $profile1->save();
        
    }
}
