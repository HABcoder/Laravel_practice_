<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'short_description',
        'sku',
        'price',
        'discount_price',
        'cost_price',
        'quantity_in_stock',
        'min_stock_level',
        'image_url',
        'is_active',
        'sub_category_id'
    ];

    public function subCategory()
    {
        return $this->belongsTo(Sub_categories::class, 'sub_category_id');
    }

    public $timestamps = false;
}
