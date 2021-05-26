<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class displayseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $display = new \App\Models\Display();
        $display->descripcion='Individual';
        $display->save();

        $display = new \App\Models\Display();
        $display->descripcion = 'Lotes';
        $display->save();
    }
}
