<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSelection extends Model
{
    use HasFactory;


    public function loadDetailSelection(){
        return $this->hasMany('App\Models\LoadDetailSelection');
    }
}
