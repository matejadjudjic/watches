<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'short_description', 'description',
        'brand_id', 'reference_number',
        'price', 'discount', 'category_id',
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }




    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('order');
    }


    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }


    public function getFirstImageAttribute()
    {
        return $this->images()->first()?->image_path ?? 'images/default.jpg';
    }

}
