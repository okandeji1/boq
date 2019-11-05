<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'uuid', 'quantity', 'cost', 'selling', 'date', 'note'
    ];
    // Category class
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Product class
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    // Vendor class
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
