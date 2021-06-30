<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class categoriesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = new \App\Models\Category();
        $categories->nombre='Construccion';
        $categories->estado=true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Electricidad';
        $categories->estado = true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Herramientas';
        $categories->estado = true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Hogar';
        $categories->estado = true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Iluminación';
        $categories->estado = true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Jardineria y agricultura';
        $categories->estado = true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Pintura';
        $categories->estado = true;
        $categories->save();

        $categories = new \App\Models\Category();
        $categories->nombre = 'Plomeria';
        $categories->estado = true;
        $categories->save();

    }
}
