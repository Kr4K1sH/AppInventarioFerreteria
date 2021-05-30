<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorysProduct extends Model
{
    use HasFactory;

    public function Inventori()
    {
        return $this->belongsTo('App\Models\Inventory');
    }
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
