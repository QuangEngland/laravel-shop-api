<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        'discount_id',
    ];

    /**
     * Relation with user (A order belongs to one user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with product (A order has many products)
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }
}
