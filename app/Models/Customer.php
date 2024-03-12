<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function request(){
        return $this->hasMany('App\Models\Request');
    }

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'rfc',
        'cp',
        'email',
        'is_active'
    ];
}
