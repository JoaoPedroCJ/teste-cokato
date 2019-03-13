<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cokato extends Model
{
    protected $fillable = ['name', 'role', 'email', 'phone', 'active'];
}
