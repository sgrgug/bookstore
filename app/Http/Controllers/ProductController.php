<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function showProduct($id)
    {
        $book = Book::find($id);

        $book_genre = Book::find($id)->genre;

        return view('product', compact('book', 'book_genre'));
    }

    public function showAllProducts($name)
    {


        if($name == 'all')
        {

            $books = Book::paginate(12);

            $genres = Genre::all();

            return view('store', compact('books', 'genres'));

        } else {

            $genre_id = Genre::where('genre', $name)->get();
            foreach($genre_id as $id){
                $gen_id = $id->id;
            }

            $books = Genre::find($gen_id)->books()->paginate(12);
            $genres = Genre::all();

            return view('store', compact('books', 'genres'));
        }
    }

    public function addToCart(Request $request, $id)
    {


        $data = [
            'name' => 'sagar',
            'address' => 'pokhara',
            'qty' => $request->qty,
            'price' => $request->price,
        ];

        Session::put('u_id', $data);

        return redirect()->route('product', $id)->with('status', "Successfully Added!");
    }
}
