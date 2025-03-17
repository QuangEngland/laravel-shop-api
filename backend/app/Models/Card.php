<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    /**
     * Relation with user (A cart belongs to one user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with product (A cart item belongs to one product)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
