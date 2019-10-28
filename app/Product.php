<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'uuid', 'category_id', 'name', 'description'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
