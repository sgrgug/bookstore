<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(8);

        return view('admin/books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        
        return view('admin/books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'book_title' => 'required',
            'book_author' => 'required',
            'p_year' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'genre' => 'required',
            'book_image' => 'required',
        ]);

        if($validate){
            $photo = $request->file('book_image');
            $filename = Str::slug($request->book_title) . '-' . time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('assets/images/book/'), $filename);

            
            $book = new Book;
            $book->title = $request->book_title;
            $book->author = $request->book_author;
            $book->publication_year = $request->p_year;
            $book->rating = $request->rating;
            $book->price = $request->price;
            $book->genre_id = $request->genre;
            $book->image = $filename;


            $book->save();
        }


        return redirect()->route('books.create')->with('status', 'Book Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $book = Book::find($id);
        $genres = Genre::all();

        return view('admin/books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $book = Book::find($id);
        
        $validate = $request->validate([
            'book_title' => 'required',
            'book_author' => 'required',
            'p_year' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'genre' => 'required',
        ]);

        $photo = $request->file('book_image');

        if($validate){

            if($photo){

                File::delete('assets/images/book/'.$book->image);

                $filename = Str::slug($request->book_title) . '-' . time() . '.' . $photo->getClientOriginalExtension();
    
                $photo->move(public_path('assets/images/book/'), $filename);

                $book->title = $request->book_title;
                $book->author = $request->book_author;
                $book->publication_year = $request->p_year;
                $book->rating = $request->rating;
                $book->price = $request->price;
                $book->genre_id = $request->genre;
                $book->image = $filename;
            }else{
                $book->title = $request->book_title;
                $book->author = $request->book_author;
                $book->publication_year = $request->p_year;
                $book->rating = $request->rating;
                $book->price = $request->price;
                $book->genre_id = $request->genre;
            }


            $book->update();
        }
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('books.index');
    }
}
