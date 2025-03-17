<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
        'image_url',
    ];

    /**
     * Relation with category (A product belongs to one category)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relation with order (A product can have many orders)
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    /**
     * Relation with cart (A product can be in many carts)
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    /**
     * Lấy URL đầy đủ của ảnh sản phẩm
     */
    public function getImageUrlAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
