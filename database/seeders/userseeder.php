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
        'foto'=>'https://www.google.com/imgres?imgurl=https%3A%2F%2Fsupport.microsoft.com%2Fsocimages%2Fappicons%2Fmicrosoft365.64x64.svg&imgrefurl=https%3A%2F%2Fsupport.microsoft.com%2Fes-hn&tbnid=ZkNm1y4fAlAt2M&vet=12ahUKEwjJxsHG-ePwAhVBRVMKHb5GCAUQMygBegUIARDSAQ..i&docid=_RSD-ia5xTOcZM&w=800&h=800&itg=1&q=microsoft&client=firefox-b-d&ved=2ahUKEwjJxsHG-ePwAhVBRVMKHb5GCAUQMygBegUIARDSAQ',
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
            'foto' => 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fsupport.microsoft.com%2Fsocimages%2Fappicons%2Fmicrosoft365.64x64.svg&imgrefurl=https%3A%2F%2Fsupport.microsoft.com%2Fes-hn&tbnid=ZkNm1y4fAlAt2M&vet=12ahUKEwjJxsHG-ePwAhVBRVMKHb5GCAUQMygBegUIARDSAQ..i&docid=_RSD-ia5xTOcZM&w=800&h=800&itg=1&q=microsoft&client=firefox-b-d&ved=2ahUKEwjJxsHG-ePwAhVBRVMKHb5GCAUQMygBegUIARDSAQ',
            'profile_id' => '1'
        ]);
        $user->save();






    }
}
