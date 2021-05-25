<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $table->string('nombre', 45);
      //  $table->string('telefono', 20);
       // $table->string('correo', 45);


       // contacto para adir
           $contacts = new \App\Models\Contact();
           $contacts->nombre='Jose Hidalgo';
           $contacts->telefono= '5557154706';
           $contacts->correo= 'adir@adir.com.mx';

           $contacts->save();
                
        //contacto para truper
        $contacts = new \App\Models\Contact();
        $contacts->nombre = 'Mario Quesada';
        $contacts->telefono = '800 018 7873';
        $contacts->correo = 'truper@truper.com.mx';
        //agrega el supplier

         $contacts->save();

        //agregar contact para 3M
        $contacts = new \App\Models\Contact();
        $contacts->nombre = 'Laura Padilla';
        $contacts->telefono = '(506) 2277 1000';
        $contacts->correo = '3M@3M.com.cr';
        //agrega el supplier

        $contacts->save();

        //agregar contact para evergreen
        $contacts = new \App\Models\Contact();
        $contacts->nombre = 'Pablo Ulloa';
        $contacts->telefono = '(506) 2213 6016';
        $contacts->correo = 'evergreeb@evergreen.com.cr';
        //agrega el supplier

        $contacts->save();

        //agregar contact para BioTec
        $contacts = new \App\Models\Contact();
        $contacts->nombre = 'Angela Loria';
        $contacts->telefono = '(506) 2258-0550';
        $contacts->correo = 'servicioalcliente@bioteccr.com';
        //agrega el supplier

        $contacts->save();

        //agregar contact para Durman
        $contacts = new \App\Models\Contact();
        $contacts->nombre = 'Dimitry Web';
        $contacts->telefono = '(506) 2436-4700';
        $contacts->correo = 'costarica@aliaxis-la.com';
        //agrega el supplier

        $contacts->save();

        //agregar contact para Lanco
        $contacts = new \App\Models\Contact();
        $contacts->nombre = 'Juan Hernandez';
        $contacts->telefono = '(506) 2430-5716';
        $contacts->correo = 'Lanco@Lanco.com';
        //agrega el supplier

        $contacts->save();


    }
}
