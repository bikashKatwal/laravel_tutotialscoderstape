<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function customers()
    {
        return $this->hasMany(Customer::class);//company has many customers::Plural so customers
        //https://www.youtube.com/watch?v=3Oxfi3DLdkI&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=14
    }
}
