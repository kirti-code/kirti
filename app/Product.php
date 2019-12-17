<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name', 'desription', 'amount', 'image', 'sku', 'status'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, "products_product_category", 'product_id', 'category_id')->withPivot('category_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
