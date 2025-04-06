<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'address', 'email', 'phone', 'position'];
}
