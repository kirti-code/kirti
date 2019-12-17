<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = ['name', 'desription', 'status'];
     protected  $primaryKey = 'category_id';
     public function Products()
     {
          return $this->belongsToMany(Product::class);
     }
     public function scopeActive($query)
     {
          return $query->where('status', 1);
     }
}
