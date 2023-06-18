<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class AdminIndexController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $book_count = Book::count();

        $users = User::paginate(8);

        return view('admin.index', compact('user_count', 'book_count', 'users'));
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('admin.index')->with('delete', 'user delete!');;
    }
}
