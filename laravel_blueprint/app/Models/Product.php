<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id', 'name', 'slug', 'description', 'price', 'stock', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function seller() { return $this->belongsTo(User::class, 'seller_id'); }
    public function reviews() { return $this->hasMany(Review::class); }
}
