<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock', 'category', 'brand', 'image_url',
    ];

    // Relasi dengan OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
