<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movementtypes extends Model
{
    use HasFactory;
    public function Movement()
    {
        return $this->hasMany('App\Models\Movement');
    }
}
