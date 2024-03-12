<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    // public function product(){
    //     return $this->belongsTo('App\Models\Product');
    // }

    public function qualityConcern(){
        return $this->hasMany('App\Models\QualityConcern');
    }

    protected $table = 'works';

    protected $fillable = [
        'description',
        'is_active'
    ];
}
