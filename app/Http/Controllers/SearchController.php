<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $results = Book::where('title', 'LIKE', '%'.$search.'%')->paginate(12);
        return view('search', compact('results', 'search'));
    }
}
