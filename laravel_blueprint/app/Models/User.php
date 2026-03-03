<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'is_suspended',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_suspended' => 'boolean',
        ];
    }

    public function products() { return $this->hasMany(Product::class, 'seller_id'); }
    public function reviews() { return $this->hasMany(Review::class); }
    public function wishlistItems() { return $this->hasMany(Wishlist::class); }
    public function cartItems() { return $this->hasMany(CartItem::class); }
}
