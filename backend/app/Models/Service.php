<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Define fillable attributes for mass assignment
    protected $fillable = ['name', 'description', 'price', 'duration'];
}
