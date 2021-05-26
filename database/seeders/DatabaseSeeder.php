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
        //especificar orden

        $this->call(profiles::class);
        $this->call(user::class);
        $this->call(display::class);
        $this->call(categories::class);
        $this->call(contacts::class);
        $this->call(suppliers::class);
        $this->call(movementtypes::class);
        $this->call(movements::class);



         //ejecutar siempre en la terminal
         //1- composer dump-autoload (para encontrar todas las actualizaciones)
         //2- php artisan db:seed
         //
         // en caso de emergencia php artisan migrate:refresh --seed
         //
    }
}
