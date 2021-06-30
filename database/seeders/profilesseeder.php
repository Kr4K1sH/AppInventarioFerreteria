<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class profilesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new \App\Models\Profile();
        $profile->descripcion='Administrador';
        $profile-> save();

        $profile1 = new \App\Models\Profile();
        $profile1->descripcion = 'Encargado';
        $profile1->save();

    }
}
