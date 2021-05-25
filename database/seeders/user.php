<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = new \App\Models\User();
        $user->identificacion='123456789';
        $user->name='Josue';
        $user->primerApellido='Castro';
        $user->segundoApellido='Chaves';
        $user->estado=true;
        $user->email='josue@gmail.com';
     //   $user->email_verified_at='';
        $user->password=bcrypt('123456');
        $user->foto= 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fsupport.microsoft.com%2Fsocimages%2Fappicons%2Fmicrosoft365.64x64.svg&imgrefurl=https%3A%2F%2Fsupport.microsoft.com%2Fes-hn&tbnid=ZkNm1y4fAlAt2M&vet=12ahUKEwjJxsHG-ePwAhVBRVMKHb5GCAUQMygBegUIARDSAQ..i&docid=_RSD-ia5xTOcZM&w=800&h=800&itg=1&q=microsoft&client=firefox-b-d&ved=2ahUKEwjJxsHG-ePwAhVBRVMKHb5GCAUQMygBegUIARDSAQ';
       // $user->getRememberToken();
        $user->perfil_id=1;

        $user->save();


    }
}
