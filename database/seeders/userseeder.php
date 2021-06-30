<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 // Se instalo la libreria: bcrypt, como instalarl: npm install bcrypt

        $user=  \App\Models\User::create([
        'identificacion' =>'123456789',
        'name' => 'Josue',
        'primerApellido' => 'Castro',
        'segundoApellido' => 'Chaves',
        'estado' => true,
        'email' => 'josue@gmail.com',
        'password' => bcrypt('123456'),//bcrypt('123456'),
         // $user->getRememberToken();
        // $user->email_verified_at='';
        'foto'=> 'https://firebasestorage.googleapis.com/v0/b/appferreteria-b40f5.appspot.com/o/imagenesUsuarios%2Fjosue.jpg?alt=media&token=6f03574c-27d3-4f3b-bedb-1a4cef4fab6b',
       'profile_id' =>'1'
]);
        $user->save();



        $user =  \App\Models\User::create([
            'identificacion' => '123456789',
            'name' => 'Bryan',
            'primerApellido' => 'Mora',
            'segundoApellido' => 'Elizondo',
            'estado' => true,
            'email' =>'bryan@gmail.com',
            'password'=> bcrypt('123456'),//bcrypt('123456'),
            //$user->getRememberToken(),
        // $user->email_verified_at='';
            'foto' => 'https://firebasestorage.googleapis.com/v0/b/appferreteria-b40f5.appspot.com/o/imagenesUsuarios%2Fbryan.jpg?alt=media&token=3645970b-c8e6-43bd-9fe8-08998072f08f',
            'profile_id' => '1'
        ]);
        $user->save();






    }
}
