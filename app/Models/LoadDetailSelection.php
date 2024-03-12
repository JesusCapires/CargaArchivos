<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadDetailSelection extends Model
{
    use HasFactory;

    public function detailSelection(){
        return $this->belongsTo('App\Models\DetailSelection');
    }
}
