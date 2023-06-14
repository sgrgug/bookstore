<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'publication_year', 'genre_id', 'rating', 'price', 'image'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
