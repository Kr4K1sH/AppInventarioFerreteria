<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public function Contacts()//tiene muchos usuarios
    {
    return $this->belongsToMany('App\Models\Contact')->withTimestamps();
    }

    public function Products()//tiene muchos productos
    {
    return $this->belongsToMany('App\Models\Product')->withTimestamps();
    }
}
