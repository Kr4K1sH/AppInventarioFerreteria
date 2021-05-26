<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //ejecutar en la terminal
         //1- composer dump-autoload (para encontrar todas las actualizaciones)
         //
         //
         // este comando es una fucion de los dos comandos de abajo : php artisan migrate:refresh --seed
         //  o botar las migraciones y recrealeas con : php artisan migrate:fresh
         // y luego aplicar los seeds php artisan db:seed

        //especificar orden
        $this->call(display::class);
        $this->call(profiles::class);
        $this->call(user::class);
        $this->call(categories::class);
        $this->call(contacts::class);
        $this->call(suppliers::class);
        $this->call(movementtypes::class);
        $this->call(movements::class);




    }
}
