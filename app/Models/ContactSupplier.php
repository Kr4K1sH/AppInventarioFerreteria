<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSupplier extends Model
{
    use HasFactory;
    public function Supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
    public function Contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

}
