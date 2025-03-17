<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id'
    ];

    /**
     * Relation with product (A category has many products)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relation with parent category (A category can have a parent category)
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Relation with parent category (A category can have a parent category)
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
