<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'established_year',
        'address',
        'phone_number',
        'website',
    ];
    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
