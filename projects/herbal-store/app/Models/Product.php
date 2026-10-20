<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'category', 'concern', 'description', 'price', 'compare_at_price',
        'rating', 'review_count', 'image_path', 'is_featured', 'is_active', 'is_demo', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer', 'compare_at_price' => 'integer', 'rating' => 'decimal:2',
            'review_count' => 'integer', 'is_featured' => 'boolean', 'is_active' => 'boolean', 'is_demo' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
