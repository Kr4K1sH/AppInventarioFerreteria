<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function Display()
    {
        return $this->belongsTo('App\Models\Display');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Locations()
    {
        return $this->belongsToMany('App\Models\Location')->withPivot('cantidad')->withTimestamps();

    }
    public function Inventories() // Se debe agregar por su relacion con inventarios
    {
        return $this->belongsToMany('App\Models\Inventory')->withTimestamps();
    }

    public function Suppliers()
    {
        return $this->belongsToMany('App\Models\Supplier')->withTimestamps();

    }


}
