<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = ['id'];


    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
