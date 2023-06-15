<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'photo', 'quantity', 'price', 'total'];
}
