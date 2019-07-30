<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInActive($query)
    {
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);// customer belongs to One company //Singular so company()
        //https://www.youtube.com/watch?v=3Oxfi3DLdkI&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=14
    }
}
