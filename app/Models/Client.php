<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Boot the model and add a global scope to always exclude deleted clients.
     * This also prevents deleted clients from logging in, since Laravel's
     * auth system uses the same Eloquent queries.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('deleted', 0);
        });
    }

    public function scopeActive($query){
        return $query->where('deleted', 0);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
