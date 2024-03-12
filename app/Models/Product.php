<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // public function work(){
    //     return $this->hasMany('App\Models\Work');
    // }

    public function selection(){
        return $this->hasMany('App\Models\Selection');
    }

    protected $table = 'products';

    protected $fillable = [
        'sku',
        'description',
        'is_active'
    ];
}
