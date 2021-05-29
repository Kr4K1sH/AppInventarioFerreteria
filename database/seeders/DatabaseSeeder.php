<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use ProductLocation;
use Prophecy\Call\Call;

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

        $this->call(profilesseeder::class);
        $this->call(userseeder::class);
        $this->call(displayseeder::class);
        $this->call(categoriesseeder::class);
        $this->call(productseeder::class);
        $this->call(contactsseeder::class);
        $this->call(suppliersseeder::class);
        $this->call(movementtypesseeders::class);
        $this->call(movementsseeder::class);
        $this->call(locationseeder::class);
        $this->call(inventoriesseeder::class);




    }
}
