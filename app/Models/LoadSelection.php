<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadSelection extends Model
{
    use HasFactory;

    public function selection(){
        return $this->belongsTo('App\Models\Selection');
    }

}
