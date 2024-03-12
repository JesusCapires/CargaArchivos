<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityConcern extends Model
{
    use HasFactory;

    public function work(){
        return $this->belongsTo('App\Models\Work');
    }

    public function selection(){
        return $this->belongsTo('App\Models\Selection');
    }


}
