<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'book_name', 'photo', 'quantity', 'price', 'total', 'payment', 'esewa_status', 'pid'];
}
