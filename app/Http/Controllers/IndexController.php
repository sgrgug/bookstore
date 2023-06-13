<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class IndexController extends Controller
{
    public function index()
    {

        $pop_books = Book::where('rating', '>=', "4")->take(8)->get();
        $new_books = Book::orderByDesc('id')->take(8)->get();
        
        return view('index', compact('pop_books', 'new_books'));
    }
}
