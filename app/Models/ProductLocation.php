<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    use HasFactory;

    public function Location()
    {
        return $this->belongsTo('App\Models\Location');
    }
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
