<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\MyCart;

class MyCartController extends Controller
{
    public function index(Request $request)
    {
        
        $mycarts = MyCart::where('user_id', auth()->user()->id)->get();

        $mycarts_total = MyCart::where('user_id', auth()->user()->id)->sum('total');
        $mycarts_no_of_items = MyCart::where('user_id', auth()->user()->id)->count();

        return view('my_cart', compact('mycarts', 'mycarts_total', 'mycarts_no_of_items'));
    }

    public function destroy($id)
    {
        $delete = MyCart::find($id);
        $delete->delete();

        return redirect()->route('my_cart');
    }

}
