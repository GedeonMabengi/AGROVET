<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'seller_id', 'subject'];

    public function messages() { return $this->hasMany(Message::class); }
}
