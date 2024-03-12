<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function qualityConcern(){
        return $this->hasMany('App\Models\QualityConcern');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function detailSelection(){
        return $this->hasMany('App\Models\DetailSelection');
    }

    public function userSelection(){
        return $this->hasOne('App\Models\UserSelection');

    }

    public function loadSelection(){
        return $this->hasMany('App\Models\LoadSelection');
    }
}
