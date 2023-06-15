<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\MyCart;
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
        // $mycart = MyCart::where('user_id', auth()->user()->id)->get();

        //get book info acc to $id
        $books = Book::where('id', $id)->get();

        foreach ($books as $key => $book) {
            $book_title = $book->title;
            $book_photo = $book->image;
            $book_price = $book->price;
        }

        $mycart = new MyCart();

        $mycart->user_id = auth()->user()->id;
        $mycart->book_id = $id;
        $mycart->book_name = $book_title;
        $mycart->photo = $book_photo;
        $mycart->quantity = $request->qty;
        $mycart->price = $book_price;
        $mycart->total = $request->qty * $book->price;

        $mycart->save();

        return redirect()->route('product', $id)->with('status', 'Added!');
    }

}
