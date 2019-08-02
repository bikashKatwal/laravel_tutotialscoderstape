<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    public function getActiveAttribute($attribute)//get_ColumnName_Attribute
    {
        return $this->activeOptions()[$attribute];
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInActive($query)
    {
        return $query->where('active', 0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);// customer belongs to One company //Singular so company()
        //https://www.youtube.com/watch?v=3Oxfi3DLdkI&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=14
    }

    public function activeOptions()
    {
        return [
            0 => 'Inactive',
            1 => 'Active',
            2 => 'In Progress'
        ];
    }


}
