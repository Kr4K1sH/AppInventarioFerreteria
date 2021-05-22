<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    use HasFactory;

    public function Supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
