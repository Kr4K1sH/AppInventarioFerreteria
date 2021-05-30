<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function Movement()//un usuario pertenece a un perfil
    {
        return $this->hasMany('App\Models\Movement');
    }

    public function User()//un usuario pertenece a un perfil
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Products() // se debde de agregadr por su relacion con productos
    {
        return $this->belongsToMany('App\Models\Product')->withTimestamps();
    }


}
