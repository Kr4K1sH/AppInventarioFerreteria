<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    public function Inventory()
    {
        return $this->belongsTo('App\Models\Inventory');
    }
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
