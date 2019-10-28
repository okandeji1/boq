<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'uuid', 'name', 'email', 'phone',
    ];
    
}
