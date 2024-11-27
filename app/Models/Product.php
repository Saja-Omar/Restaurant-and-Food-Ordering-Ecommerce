<?php

namespace App\Models;

use App\Models\ProductSize;
use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumb_image',
        'category_id',
        'short_description',
        'long_description',
        'price',
        'offer_price',
        'sku',
        'seo_title',
        'seo_description',
        'show_at_home',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function ProductOptions()
    {
        return $this->hasMany(ProductOption::class);
    }

}

