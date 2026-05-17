<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $fillable = [
        'name',
        'last_name',
        'document',
        'address',
        'phone',
        'email',
        'password',
        'deleted',
    ];

    public $timestamps = false;

    public function scopeActive($query){
        return $query->where('deleted', 0);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
